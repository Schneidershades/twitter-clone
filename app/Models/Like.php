<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Spatie\MediaLibrary\Models\Media;
// use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Like extends Model
{
    use HasFactory;

    protected $guarded = [];

    // public function baseMedia()
    // {
    // 	return $this->belongsTo(Media::class, 'media_id');
    // }

}
