<?php

namespace App\Policies;

use App\Models\Branch;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BranchPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        $moduleName=PolicyHelper::getModuleName((new \ReflectionClass($this))->getShortName());
        $permission=__FUNCTION__;
        if(PolicyHelper::isSuperAdmin($user)){return true;}
        return PolicyHelper::policy($user,$moduleName,$permission);
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Branch $branch)
    {
        $moduleName=PolicyHelper::getModuleName((new \ReflectionClass($this))->getShortName());
        $permission=__FUNCTION__;
        if(PolicyHelper::isSuperAdmin($user)){return true;}
        return PolicyHelper::policy($user,$moduleName,$permission);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        $moduleName = PolicyHelper::getModuleName((new \ReflectionClass($this))->getShortName());
        $permission = __FUNCTION__;
        if(PolicyHelper::isSuperAdmin($user)){return true;}
        return PolicyHelper::policy($user, $moduleName, $permission);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Branch $branch=null)
    {
        $moduleName=PolicyHelper::getModuleName((new \ReflectionClass($this))->getShortName());
        $permission=__FUNCTION__;
        if(PolicyHelper::isSuperAdmin($user)){return true;}
        return PolicyHelper::policy($user,$moduleName,$permission,$branch);
    }

    public function delete(User $user, Branch $branch=null)
    {
        $moduleName=PolicyHelper::getModuleName((new \ReflectionClass($this))->getShortName());
        $permission=__FUNCTION__;
        if(PolicyHelper::isSuperAdmin($user)){return true;}
        return PolicyHelper::policy($user,$moduleName,$permission,$branch);
    
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Branch $branch)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Branch $branch)
    {
        //
    }
}
