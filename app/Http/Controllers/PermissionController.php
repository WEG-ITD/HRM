<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $currentPermission=[];
        $Permissions=Permission::get()->where('role_id',$id)->map(function($permission){
            return [
            'id'=>$permission->id,
            'module_id'=>$permission->module->id,
            'module'=>$permission->module->name,
            'permission'=>$permission->permission,
            'permissionCollection'=>$permission->module->id.'-'.$permission->permission,
            ];
        });
        foreach($Permissions as $item){//[{module_id:1,module:User,permission:view,permissionCollection:'1-view'},{}]

            array_push($currentPermission,$item['permissionCollection']);
        }
        $deleting=$currentPermission;// ['1-view','1-update']
        $creating=$request->all();// ['1-view','1-update']

        foreach($currentPermission as $current){
            $unchange=0;
            foreach($request->all() as $new){
                if($current==$new){

                    $unchange++;
                }
            }
            if($unchange>0){
                unset($deleting[array_search($current, $deleting)]); //all old - ignore assemble delete
                unset($creating[array_search($current, $creating)]); //all new - ignore assemble create
            }

        }
        foreach($creating as $create){
            Permission::create([
                'role_id' => $id,
                'module_id'=>explode('-',$create)[0],
                'permission'=>explode('-',$create)[1],
            ]);
        }

        foreach($deleting as $delete){
            Permission::where('role_id',$id)->where('module_id',explode('-',$delete)[0])->where('permission',explode('-',$delete)[1])->delete();
        }

        return [
            'message'=> 'Role has been updated successfully. ',
            'snackColor'=> 'success',
            "status" => ApiResponse::STATUS_OK,
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        //
    }
}
