<?php

namespace App\Http\Resources;

use App\Models\Commune;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Resources\Json\JsonResource;

class CommuneResource extends JsonResource
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
            'district_id' => $this->district_id,
            'name_en' => $this->name_en,
            'name_kh' => $this->name_kh,
            'code' => $this->code,
            'can' => [
                'delete' => Auth::user()->can('delete', Commune::find($this->id)),
                'update' => Auth::user()->can('update', Commune::find($this->id)),
            ]
        ];
    }
}
