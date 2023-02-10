<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Controllers\ApiResponse;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
class RoleResource extends JsonResource
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
            'value' => $this->value,
            'name' => $this->name,
            'permissions' => $this->permissions,
            'can'=>[
                'delete'=>Auth::user()->can('delete',Role::find($this->id)),
                'update'=>Auth::user()->can('update',Role::find($this->id)),
                'viewPermission'=>Auth::user()->can('viewAny',Permission::class),
                'updatePermission'=>Auth::user()->can('update',Permission::class),
            ]
        ];
    }
    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
 
}
