<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'branch_id',
        'title',
        'user_id',
        'page_layout',
        'user_photo_style',
        'photo_size',
        'layout_spacing_top',
        'layout_spacing_bottom',
        'layout_spacing_right',
        'layout_spacing_left',
        'signature_image',
        'logo_image',
        'background_image',
        'certificate_content',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
