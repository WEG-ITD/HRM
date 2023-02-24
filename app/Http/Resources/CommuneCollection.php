<?php

namespace App\Http\Resources;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ApiResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CommuneCollection extends ResourceCollection
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
                'import' => Auth::user()->can('import', District::class),
                'export' => Auth::user()->can('export', District::class),
            ]
        ];
    }
}
