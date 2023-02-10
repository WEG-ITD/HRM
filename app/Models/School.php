<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class School extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'id', 'name_en', 'name_kh', 'code', 'description', 'created_at', 'updated_at','created_by','deleted_by'
    ];

    public function branch()
    {
        return $this->hasMany(Branch::class);
    }
}
