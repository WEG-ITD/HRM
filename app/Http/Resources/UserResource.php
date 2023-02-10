<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Controllers\ApiResponse;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\UserPermissionResource;

class UserResource extends JsonResource
{
   /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'userName' => $this->user_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'status' => $this->status,
            // 'permissions' => new UserPermissionResource($this->role),
            // 'roleName' => $this->role->name,
            'branch' => $this->branch,
            'roles'=>$this->roles,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
            'can'=>[
                'delete'=>Auth::user()->can('delete',User::find($this->id)),
                'update'=>Auth::user()->can('update',User::find($this->id)),
            ]
        ];
    }

}
