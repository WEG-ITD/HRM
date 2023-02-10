<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Controllers\ApiResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\Branch;

class BranchCollection extends ResourceCollection
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
                'create'=>Auth::user()->can('create',Branch::class),
                'import'=>Auth::user()->can('import',Branch::class),
                'export'=>Auth::user()->can('export',Branch::class),
            ]
        ];
    }

}
