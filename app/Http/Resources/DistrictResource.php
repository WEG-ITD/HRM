<?php

namespace App\Http\Resources;

use App\Models\District;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Resources\Json\JsonResource;

class DistrictResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'province_id' => $this->province_id,
            'name_en' => $this->name_en,
            'name_kh' => $this->name_kh,
            'code' => $this->code,
            'note' => $this->note,
            'status' => $this->status,
            'can' => [
                'delete' => Auth::user()->can('delete', District::find($this->id)),
                'update' => Auth::user()->can('update', District::find($this->id)),
            ]
        ];
    }
}
