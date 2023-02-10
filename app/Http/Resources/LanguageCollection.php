<?php

namespace App\Http\Resources;

use App\Http\Controllers\ApiResponse;
use App\Models\Language;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Auth;

class LanguageCollection extends ResourceCollection
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
                'create' => Auth::user()->can('create', Language::class),
                'import' => Auth::user()->can('import', Language::class),
                'export' => Auth::user()->can('export', Language::class),
            ]
        ];
    }
}
