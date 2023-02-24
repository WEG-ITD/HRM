<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Village;
use Illuminate\Auth\Access\HandlesAuthorization;

class VillagePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        $moduleName = PolicyHelper::getModuleName((new \ReflectionClass($this))->getShortName());
        $permission = __FUNCTION__;
        if(PolicyHelper::isSuperAdmin($user)){return true;}
        return PolicyHelper::policy($user, $moduleName, $permission);
    }

    public function view(User $user, Village $village)
    {
        $moduleName = PolicyHelper::getModuleName((new \ReflectionClass($this))->getShortName());
        $permission = __FUNCTION__;
        if(PolicyHelper::isSuperAdmin($user)){return true;}
        return PolicyHelper::policy($user, $moduleName, $permission);
    }
}
