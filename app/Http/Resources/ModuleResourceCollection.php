<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Models\Module;
use App\Http\Controllers\ApiResponse;
use Illuminate\Support\Facades\Auth;
class ModuleResourceCollection extends ResourceCollection
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
            'can'=>[
                'create'=>Auth::user()->can('create',Module::class),
                'import'=>Auth::user()->can('import',Module::class),
                'export'=>Auth::user()->can('export',Module::class),
            ]
        ];
    }
}
