<?php

namespace App\Http\Resources;

use App\Http\Controllers\ApiResponse;
use App\Models\Religion;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Auth;

class ReligionCollection extends ResourceCollection
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
            'title' => ApiResponse::TITLE_OK,
            'status' => ApiResponse::STATUS_OK,
            'can' => [
                'create' => Auth::user()->can('create', Religion::class),
                'import' => Auth::user()->can('import', Religion::class),
                'export' => Auth::user()->can('export', Religion::class),
            ]
        ];
    }
}
