<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'id',
        'role_id',
        'module_id',
        'permission',
    ];
    public function role(){
        return $this->belongsTo(Role::class);
    }
    public function module(){
        return $this->belongsTo(Module::class);
    }
}
