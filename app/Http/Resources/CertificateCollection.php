<?php

namespace App\Http\Resources;

use App\Models\Certificate;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ApiResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CertificateCollection extends ResourceCollection
{
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
                'create' => Auth::user()->can('create', Certificate::class),
                'import' => Auth::user()->can('import', Certificate::class),
                'export' => Auth::user()->can('export', Certificate::class),
            ]
        ];
    }

}
