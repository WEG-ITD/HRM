<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    use HasFactory;
    protected $fillable = [
        'id','commune_id', 'name_kh', 'name_en', 'code', 'reference', 'status'
    ];

    public function districts() {
        return $this->hasMany(District::class);
    }
    public function communes() {
        return $this->hasMany(Commune::class);
    }
}
