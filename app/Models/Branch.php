<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Permission;
use App\Models\School;
use App\Models\Location;
use Illuminate\Database\Eloquent\SoftDeletes;
class Branch extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'id','school_id','name_en','name_kh','code','description','created_by','deleted_by'
    ];

    public function school()
    {
        return $this->belongsTo(School::class);
    }
    public function location() {
        return $this->belongsTo(Location::class);
    }
}
