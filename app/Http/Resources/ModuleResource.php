<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Module;
use Illuminate\Support\Facades\Auth;
class ModuleResource extends JsonResource
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
            'name'=>$this->name,    
            'id'=>$this->id,
            'is_main'=>$this->is_main,
            'have_workflow'=>$this->have_workflow,
            'main_module'=>$this->main_module->name,
            'can'=>[
                'delete'=>Auth::user()->can('delete',Module::find($this->id)),
                'update'=>Auth::user()->can('update',Module::find($this->id)),
            ]
        ];
    }
}
