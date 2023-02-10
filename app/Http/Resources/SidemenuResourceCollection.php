<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Sidemenu;
use App\Http\Controllers\ApiResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Resources\Json\ResourceCollection;
class SidemenuResourceCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return parent::toArray($request);
    }
    public function with($request)
    {
        return [
            "title" => ApiResponse::TITLE_OK,
            "status" => ApiResponse::STATUS_OK,
            'can'=>[
                'create'=>Auth::user()->can('create',Sidemenu::class),
                'import'=>Auth::user()->can('import',Sidemenu::class),
                'export'=>Auth::user()->can('export',Sidemenu::class),
            ]
        ];
    }
}
