<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\RoleResource;
use App\Http\Resources\RoleResourceCollection;
use App\Http\Resources\ErrorBadRequest;
use App\Models\Role;
use App\Models\Permission;
use App\Models\Module;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Role::class, 'role');
        
    }
    public function index() {
        
        $roles =  Role::get()->map(function($role){
            return[
                'name'=>$role->name,
                'value'=>$role->value,
                'id'=>$role->id,
                // 'can'=>[
                //     'edit'=>Auth::user()->can('edit',$role)
                // ],
                'permissions'=>Permission::where('role_id',$role->id)->get()->map(function($permission){
                    return[
                        'id'=>$permission->id,
                        'module'=>$permission->module->name,
                        'permission'=>$permission->permission,
                        'permissionCollection'=>$permission->module->id.'-'.$permission->permission,
                    ];
                }),
                'can'=>[
                    'delete'=>Auth::user()->can('delete',Role::find($role->id)),
                    'update'=>Auth::user()->can('update',Role::find($role->id)),
                    'viewPermission'=>Auth::user()->can('viewAny',Permission::class),
                    'updatePermission'=>Auth::user()->can('update',Permission::class),
                ]
            ];
        });
        return [
            'data'=>[
                'roles'=>$roles,
                'modules'=>Module::where('is_main',1)->get(),
                'can'=>[
                    'create'=>Auth::user()->can('create',Role::class),
                    'import'=>Auth::user()->can('import',Role::class),
                    'export'=>Auth::user()->can('export',Role::class),
                ]
            
            ]
        ];
    }
    /**
     * Add new role
    */
    public function store(Request $request) {
        //validate
        $validated=$request->validate([
            'name' => ['required', 'max:25'],
            'value' => ['required', 'max:25'],
          
        ]);
        
        //create role`
        $role=Role::create([
            'name' => $request->name,
            'value' => $request->value,
       ]);
        
        //redirect back to roles
        return [
            'message'=> 'Role has been added successfully. ',
            'snackColor'=> 'success',
            "status" => ApiResponse::STATUS_OK,
        ];
    }
    /**
     * Edit new role
    */
    public function update(Request $request,Role $role) {
        //validate
        $validated=$request->validate([
            'name' => ['required', 'max:25'],
            'value' => ['required', 'max:25'],
        ]);
        
        //create role`
        $role->update([
            'name' => $request->name,
            'value' => $request->value,
       ]);
        
        //redirect back to roles
        return [
            'message'=> 'Role has been updated successfully. ',
            'snackColor'=> 'success',
            "status" => ApiResponse::STATUS_OK,
        ];
    }
}
