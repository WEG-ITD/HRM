<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Permission;
class Module extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'name',
        'status',
        'is_main',
        'have_workflow',
        'main_module_id'
    ];
    public function permission()
    {
        return $this->hasMany(Permission::class);
    } 
    public function main_module()
    {
        return $this->belongsTo(MainModule::class);
    } 
    public function sidemenus()
    {
        return $this->hasMany(Sidemenu::class);
    } 
    
}
