<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Sidemenu;
use Illuminate\Support\Facades\Auth;
class SidemenuResource extends JsonResource
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
            'id'=>$this->id,
            'module'=>$this->module?$this->name:'Root',
            'module_id'=>$this->module_id,
            'type'=>$this->type,
            'name'=>$this->name,
            'link'=>$this->link,
            'icon'=>$this->icon,
            'ordering'=>$this->ordering,
            'parentId'=>$this->parentId,
            'parent'=>(Sidemenu::find($this->parentId)&&$this->parentId!=0)?Sidemenu::find($this->parentId)->name:'Root',
            'is_report'=>$this->is_report,
            'can'=>[
                'delete'=>Auth::user()->can('delete',Sidemenu::find($this->id)),
                'update'=>Auth::user()->can('update',Sidemenu::find($this->id)),
            ]
        ];
    }
   
}
