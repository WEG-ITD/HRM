<?php

namespace App\Policies;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PermissionPolicy
{
    use HandlesAuthorization;

  
    public function viewAny(User $user)
    {
        $moduleName=PolicyHelper::getModuleName((new \ReflectionClass($this))->getShortName());
        $permission=__FUNCTION__;
        if(PolicyHelper::isSuperAdmin($user)){return true;}
        return PolicyHelper::policy($user,$moduleName,$permission);
    }

    public function update(User $user)
    {
        $moduleName=PolicyHelper::getModuleName((new \ReflectionClass($this))->getShortName());
        $permission=__FUNCTION__;
        if(PolicyHelper::isSuperAdmin($user)){return true;}
        return PolicyHelper::policy($user,$moduleName,$permission);
    }

}
