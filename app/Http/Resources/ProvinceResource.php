<?php

namespace App\Http\Resources;

use App\Models\Province;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Resources\Json\JsonResource;

class ProvinceResource extends JsonResource
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
            'name_en' => $this->name_en,
            'name_kh' => $this->name_kh,
            'code' => $this->code,
            'city_name_kh' => $this->city_name_kh,
            'city_name_en' => $this->city_name_en,
            'reference' => $this->reference,
            'note' => $this->note,
            'status' => $this->status,
            'can' => [
                'delete' => Auth::user()->can('delete', Province::find($this->id)),
                'update' => Auth::user()->can('update', Province::find($this->id)),
            ]
        ];
    }
}
