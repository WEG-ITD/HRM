<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Permission;
use App\Http\Controllers\ApiResponse;
use App\Http\Resources\ErrorForbidden;
use JWTAuth;

class PermissionMiddleware
{
/**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $permission=null)
    {
        if($token = JWTAuth::parseToken()) {
            $user= JWTAuth::toUser($token);
            
            foreach ($user->roles as $key => $role) { 
                foreach ($role->permissions as $key => $rolePermission) { 
                    if($rolePermission->value != $permission){
                        continue;
                    } else {
                        return $next($request);
                    }
                }
            }
        }
        return new ErrorForbidden(['message' => "No permission"]);
    }
}
