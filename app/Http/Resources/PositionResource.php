<?php

namespace App\Http\Resources;

use App\Models\Position;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Resources\Json\JsonResource;

class PositionResource extends JsonResource
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
            'description' => $this->description,
            'can' => [
                'delete' => Auth::user()->can('delete', Position::find($this->id)),
                'update' => Auth::user()->can('update', Position::find($this->id)),
            ]
        ];
    }
}
