<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'id', 'name_kh', 'name_en', 'iso_3166_1', 'nationality_kh', 'nationlity_en', 'status'
    ];
}
