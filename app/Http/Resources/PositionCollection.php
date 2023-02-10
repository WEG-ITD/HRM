<?php

namespace App\Http\Resources;

use App\Models\Position;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ApiResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PositionCollection extends ResourceCollection
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
                'create' => Auth::user()->can('create', Position::class),
                'import' => Auth::user()->can('import', Position::class),
                'export' => Auth::user()->can('export', Position::class),
            ]
        ];
    }
}
