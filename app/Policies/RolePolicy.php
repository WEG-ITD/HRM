<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        $moduleName=PolicyHelper::getModuleName((new \ReflectionClass($this))->getShortName());
        $permission=__FUNCTION__;
        if(PolicyHelper::isSuperAdmin($user)){return true;}
        return PolicyHelper::policy($user,$moduleName,$permission);
    }

    public function view(User $user, Role $Role=null)
    {
        $moduleName=PolicyHelper::getModuleName((new \ReflectionClass($this))->getShortName());
        $permission=__FUNCTION__;
        if(PolicyHelper::isSuperAdmin($user)){return true;}
        return PolicyHelper::policy($user,$moduleName,$permission);
    }

    public function create(User $user)
    {
        $moduleName=PolicyHelper::getModuleName((new \ReflectionClass($this))->getShortName());
        $permission=__FUNCTION__;
        if(PolicyHelper::isSuperAdmin($user)){return true;}
        return PolicyHelper::policy($user,$moduleName,$permission);
    }

    public function update(User $user, Role $Role=null)
    {
        $moduleName=PolicyHelper::getModuleName((new \ReflectionClass($this))->getShortName());
        $permission=__FUNCTION__;
        if(PolicyHelper::isSuperAdmin($user)){return true;}
        return PolicyHelper::policy($user,$moduleName,$permission,$Role);
    }

    public function delete(User $user, Role $Role=null)
    {
        $moduleName=PolicyHelper::getModuleName((new \ReflectionClass($this))->getShortName());
        $permission=__FUNCTION__;
        if(PolicyHelper::isSuperAdmin($user)){return true;}
        return PolicyHelper::policy($user,$moduleName,$permission,$Role);
    }

    public function restore(User $user, Role $Role)
    {
        $moduleName=PolicyHelper::getModuleName((new \ReflectionClass($this))->getShortName());
        $permission=__FUNCTION__;
        if(PolicyHelper::isSuperAdmin($user)){return true;}
        return PolicyHelper::policy($user,$moduleName,$permission);
    }

    public function forceDelete(User $user, Role $Role)
    {
        $moduleName=PolicyHelper::getModuleName((new \ReflectionClass($this))->getShortName());
        $permission=__FUNCTION__;
        if(PolicyHelper::isSuperAdmin($user)){return true;}
        return PolicyHelper::policy($user,$moduleName,$permission);
    }
    public function import(User $user)
    {
        $moduleName=PolicyHelper::getModuleName((new \ReflectionClass($this))->getShortName());
        $permission=__FUNCTION__;
        if(PolicyHelper::isSuperAdmin($user)){return true;}
        return PolicyHelper::policy($user,$moduleName,$permission);
    }
    public function export(User $user)
    {
        $moduleName=PolicyHelper::getModuleName((new \ReflectionClass($this))->getShortName());
        $permission=__FUNCTION__;
        if(PolicyHelper::isSuperAdmin($user)){return true;}
        return PolicyHelper::policy($user,$moduleName,$permission);
    }
    public function print(User $user)
    {
        $moduleName=PolicyHelper::getModuleName((new \ReflectionClass($this))->getShortName());
        $permission=__FUNCTION__;
        if(PolicyHelper::isSuperAdmin($user)){return true;}
        return PolicyHelper::policy($user,$moduleName,$permission);
    }
}
