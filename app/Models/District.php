<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 'province_id', 'name_kh', 'name_en', 'code', 'reference', 'status'
    ];

    public function provinces() {
        return $this->hasMany(Province::class);
    }
    public function communes() {
        return $this->hasMany(Commune::class);
    }
}
