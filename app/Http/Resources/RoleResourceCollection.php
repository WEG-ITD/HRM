<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Models\Role;
use App\Http\Controllers\ApiResponse;
use Illuminate\Support\Facades\Auth;

class RoleResourceCollection extends ResourceCollection
{
   /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function with($request)
    {
        return [
            "title" => ApiResponse::TITLE_OK,
            "status" => ApiResponse::STATUS_OK,
            'can'=>[
                'create'=>Auth::user()->can('create',Role::class),
                'import'=>Auth::user()->can('import',Role::class),
                'export'=>Auth::user()->can('export',Role::class),
            ]
        ];
    }
}
