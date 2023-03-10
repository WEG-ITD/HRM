<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 'name_en', 'name_kh', 'created_at', 'updated_at'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
