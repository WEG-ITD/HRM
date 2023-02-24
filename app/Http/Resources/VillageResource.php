<?php

namespace App\Http\Resources;

use App\Models\Village;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Resources\Json\JsonResource;

class VillageResource extends JsonResource
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
            'commune_id' => $this->commune_id,
            'code' => $this->code,
            'reference' => $this->reference,
            'code' => $this->code,
            'can' => [
                'delete' => Auth::user()->can('delete', Village::find($this->id)),
                'update' => Auth::user()->can('update', Village::find($this->id)),
            ]
        ];
    }
}
