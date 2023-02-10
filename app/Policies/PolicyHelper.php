<?php

namespace App\Policies;

use App\Models\Permission;
use App\Models\User;
use App\Models\Role;
use App\Models\Module;
// use App\Models\Delegation;
use Illuminate\Auth\Access\HandlesAuthorization;

class PolicyHelper
{
    public function policy($user,$moduleName,$permission,$item=null){
        $can=true;
        if($item){
            $can=($item->created_by==$user->id);
            //condition that this user can update/delete this specific item. example: user is the one who create it.

        }
        $module=Module::where('name',$moduleName)->first();
        $p=Permission::whereIn('role_id',$user->roles->pluck('id'))->where('module_id',$module->id)->where('permission',$permission);
        
        return ($p->count()>0)&&$can;
    }
  
    public function isSuperAdmin($user){
        foreach($user->roles as $role){
            if($role->id==1){
                return true;
            }
        } 
        return false;
    }
    
    public function getModuleName($className){
        return explode('Policy',$className)[0];
    }

}