<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageDetail extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function images_upload()
    {
        return $this->belongsTo(images_upload::class,'id');
    }
}
