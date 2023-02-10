<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;

class Sidemenu extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'name',
        'module_id',
        'type',
        'icon',
        'link',
        'ordering',
        'parentId',
        'is_report',
    ];
    public function module()
    {
        return $this->belongsTo(Module::class);
    } 
}
