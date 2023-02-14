<?php

namespace App\Http\Resources;

use App\Models\Branch;
use App\Models\School;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class BranchResource extends JsonResource
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
            'school_name' => $this->school->name_en,
            'school_id' => $this->school_id,
            'name_en' => $this->name_en,
            'name_kh' => $this->name_kh,
            'code' => $this->code,
            'description' => $this->description,
            'can'=>[
                'delete'=>Auth::user()->can('delete',Branch::find($this->id)),
                'update'=>Auth::user()->can('update',Branch::find($this->id)),
            ]
        ];
    }
}
