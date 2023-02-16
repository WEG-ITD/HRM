<?php

namespace App\Http\Resources;

use App\Models\Certificate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Resources\Json\JsonResource;

class CertificateResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'branch_id' => $this->branch_id,
            'user_id' => $this->user_id,
            'page_layout' => $this->page_layout,
            'user_photo_style' => $this->user_photo_style,
            'layout_spacing_top' => $this->layout_spacing_top,
            'layout_spacing_bottom' => $this->layout_spacing_bottom,
            'layout_spacing_right' => $this->layout_spacing_right,
            'layout_spacing_left' => $this->layout_spacing_left,
            'certificate_content' => $this->certificate_content,
            'signature_image' => asset($this->signature_image),
            'logo_image' => asset($this->logo_image),
            'background_image' => asset($this->background_image),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'can' => [
                'delete' => Auth::user()->can('delete', Certificate::find($this->id)),
                'update' => Auth::user()->can('update', Certificate::find($this->id)),
            ]
        ];
    }
}
