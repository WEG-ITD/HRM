<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    use HasFactory;
    protected $fillable = [
        'id','district_id', 'name_kh', 'name_en', 'code', 'reference', 'status'
    ];

    public function districts() {
        return $this->hasMany(District::class);
    }
    public function villages() {
        return $this->hasMany(Village::class);
    }
}
