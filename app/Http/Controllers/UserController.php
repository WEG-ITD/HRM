<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Response;
use App\Http\Resources\ErrorUnauthorized;
use App\Http\Resources\CustomerResource;
use App\Http\Resources\ErrorBadRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserResourceCollection;
use App\Http\Resources\RoleResourceCollection;
use App\Models\User;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\Sidemenu;
use App\Models\Permission;

class UserController extends Controller
{
    /**
     * func login
     */
    public function login(Request $request) {
        //validation
        $credentials = $request->validate([
            'user_name' => ['required'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt(['user_name'=>$request->user_name,'password'=>$request->password])) {
            $request->session()->regenerate();
 
            $user=Auth::user();
      
           
            //menus

            $menu=[];
            $nonReportModuleId=[0];
            $reportModuleId=[0];
            $roles=$user->roles;
            $isAdmin=0;
            //
            $token = $user->createToken('myToken');
            foreach($roles as $role){
                if($role->id==1){$isAdmin++;}
            }
            if($isAdmin>0){
                $menu=Sidemenu::get();
                $data = [
                    'token' => $token->plainTextToken,
                    'user' => new UserResource($user),
                    'menu'=>$menu,
                ];
                return new Response($data);
            }else{
                $permission=Permission::get()
                    ->whereIn('permission',['viewAny','report'])->whereIn('role_id',$roles->pluck('id'));
                foreach($permission as $p){
                    if($p->permission=='viewAny'){
                        array_push($nonReportModuleId,$p->module_id);
                    }else{
                        array_push($reportModuleId,$p->module_id);
                    }
                }
                
                $menu=Sidemenu::
                where(function($query) use($nonReportModuleId){
                    return $query->whereIn('module_id',$nonReportModuleId)
                        ->where('is_report',0);
                })
                ->orWhere(function($query) use($reportModuleId){
                    return $query->whereIn('module_id',$reportModuleId)
                        ->where('is_report',1);
                })->get();
            }
            $data = [
                'token' => $token,
                'user' => new UserResource($user),
                'menu'=>$menu,
            ];

            //
            return new Response($data);

        }
        return new ErrorBadRequest([
            'message' => 'Invalid Email or Password',
        ]);
    }
    /**
     * register user
    */
    
    public function store(Request $request) {
        
        $validated=$request->validate([
            'name' => ['required', 'max:25'],
            'phone' => ['required', 'max:10'],
            'email' => ['required', 'max:50','email'],
            'user_name' => ['required', 'max:50','unique:users,user_name'],
            'role_id'=> ['required'],
            'password'=>['required']
        ]);
        
        //create user`
        $user=User::create([
            'name' => $request->name,
            'phone'=> $request->phone,
            'email' => $request->email,
            'user_name'=>$request->user_name,
            'password' => Hash::make($request->password),
        ]);
        foreach($request->role_id as $role){
            RoleUser::create([
                'user_id'=>$user->id,
                'role_id'=>$role['id'],
            ]);
        }
        
        //redirect back to Users
        return [
            'message'=> 'User has been added successfully. ',
            'snackColor'=> 'success',
            "status" => ApiResponse::STATUS_OK,
        ];
        
    }
    /**
    *Logout
    */
    public function logout()
    { 
        // $user = JWTAuth::user();
        // JWTAuth::parseToken()->invalidate(true);
        return new Response($user);
    }
    /**
     * Get all user
     */
    public function index() {
        return new UserResourceCollection(User::all());
    }

    /**
     * edit user
    */
    public function update(Request $request) {
        //get users
        $user = User::find($request->id);
   

       
        $validated=$request->validate([
            'name' => ['required', 'max:25'],
            'phone' => ['required', 'max:10'],
            'email' => ['required', 'max:50','email'],
            'user_name' => ['required', 'max:50','unique:users,user_name,'.$user->id],
           
        ]);
        //create user`
        $user->update([
            'name' => $request->name,
            'phone'=> $request->phone,
            'email' => $request->email,
            'user_name'=>$request->user_name,
        ]);
        //redirect back to Users
        return [
            'message'=> 'User has been successfully updated. ',
            'snackColor'=> 'success',
            "status" => ApiResponse::STATUS_OK,
        ];
    }
    public function getUserRoles($id){
        return User::find($id)->roles;
    }
    public function addRole(Request $request){
        $validated=$request->validate([
            'user' => ['required'],
            'role' => ['required'],
        ]);

        $roleUser=RoleUser::where('user_id',$request->user)
                            ->where('role_id',$request->role)->get();
        if(count($roleUser)==0){
            RoleUser::create([
                'user_id'=>$request->user,
                'role_id'=>$request->role,
            ]);
            return [
                'message'=> 'Role has been added to this user. ',
                'snackColor'=> 'success',
                "status" => ApiResponse::STATUS_OK,
                'roles'=> User::find($request->user)->roles,
            ];
        }else{
            return [
                'message'=> 'User already has this role. ',
                'snackColor'=> 'danger',
                "status" => ApiResponse::STATUS_BAD_REQUEST,
                'roles'=> User::find($request->user)->roles,
            ];
        }
        
    }
    public function removeRole($id){
        $roleUser= RoleUser::find($id);
        $user_id=$roleUser->user_id;
        $roleUser->delete();
        return [
            'message'=> 'Role has been removed from this user. ',
            'snackColor'=> 'red',
            "status" => ApiResponse::STATUS_OK,
            'roles'=> User::find($user_id)->roles,
        ];
    }
    public function resetPassword(Request $request){
        
         $validated=$request->validate([
             'password' => ['required', 'max:25'],
         ]);
         //create user`
         User::find($request->user_id)->update([
             'password' => Hash::make($request->password),
         ]);
         //redirect back to Users
         return [
             'message'=> 'Password has been updated.',
             'snackColor'=> 'success',
             "status" => ApiResponse::STATUS_OK,
         ];
    }
    
}
