<?php

namespace App\Http\Resources;

use App\Http\Controllers\ApiResponse;
use App\Models\Country;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Auth;

class CountryCollection extends ResourceCollection
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
                'create' => Auth::user()->can('create', Country::class),
                'import' => Auth::user()->can('import', Country::class),
                'export' => Auth::user()->can('export', Country::class),
            ]
        ];
    }
}
