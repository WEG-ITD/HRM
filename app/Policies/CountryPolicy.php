<?php

namespace App\Policies;

use App\Models\Country;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CountryPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        $moduleName = PolicyHelper::getModuleName((new \ReflectionClass($this))->getShortName());
        $permission = __FUNCTION__;
        if(PolicyHelper::isSuperAdmin($user)){return true;}
        return PolicyHelper::policy($user, $moduleName, $permission);
    }

    public function view(User $user, Country $country)
    {
        $moduleName = PolicyHelper::getModuleName((new \ReflectionClass($this))->getShortName());
        $permission = __FUNCTION__;
        if(PolicyHelper::isSuperAdmin($user)){return true;}
        return PolicyHelper::policy($user, $moduleName, $permission);
    }

    public function create(User $user)
    {
        $moduleName = PolicyHelper::getModuleName((new \ReflectionClass($this))->getShortName());
        $permission = __FUNCTION__;
        if(PolicyHelper::isSuperAdmin($user)){return true;}
        return PolicyHelper::policy($user, $moduleName, $permission);
    }

    public function update(User $user, Country $country)
    {
        $moduleName = PolicyHelper::getModuleName((new \ReflectionClass($this))->getShortName());
        $permission = __FUNCTION__;
        if(PolicyHelper::isSuperAdmin($user)){return true;}
        return PolicyHelper::policy($user, $moduleName, $permission);
    }

    public function delete(User $user, Country $country)
    {
        $moduleName = PolicyHelper::getModuleName((new \ReflectionClass($this))->getShortName());
        $permission = __FUNCTION__;
        if(PolicyHelper::isSuperAdmin($user)){return true;}
        return PolicyHelper::policy($user, $moduleName, $permission);
    }

    public function restore(User $user, Country $country)
    {
        $moduleName = PolicyHelper::getModuleName((new \ReflectionClass($this))->getShortName());
        $permission = __FUNCTION__;
        if(PolicyHelper::isSuperAdmin($user)){return true;}
        return PolicyHelper::policy($user, $moduleName, $permission);
    }

    public function forceDelete(User $user, Country $country)
    {
        $moduleName = PolicyHelper::getModuleName((new \ReflectionClass($this))->getShortName());
        $permission = __FUNCTION__;
        if(PolicyHelper::isSuperAdmin($user)){return true;}
        return PolicyHelper::policy($user, $moduleName, $permission);
    }
}
