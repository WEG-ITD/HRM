<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Controllers\ApiResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class UserResourceCollection extends ResourceCollection
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
   
    public function with($request)
    {
        return [
            "title" => ApiResponse::TITLE_OK,
            "status" => ApiResponse::STATUS_OK,
            'auth'=>Auth::user(),
            'can'=>[
                'create'=>Auth::user()->can('create',User::class),
                'import'=>Auth::user()->can('import',User::class),
                'export'=>Auth::user()->can('export',User::class),
            ]
        ];
    }
}
