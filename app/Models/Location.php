<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'id', 'title', 'outside_cambodia', 'house_street', 'house_street_kh', 'country_id', 'province_id', 'district_id', 'commune_id', 'village_id','status'
    ];

    public function countries() {
        return $this->belongsTo(Country::class);
    }
    public function provinces() {
        return $this->belongsTo(Province::class);
    }
    public function districts() {
        return $this->belongsTo(District::class);
    }
    public function communes() {
        return $this->belongsTo(Commune::class);
    }
    public function villages() {
        return $this->belongsTo(Village::class);
    }
}
