<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Media\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class TweetMedia extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    public function baseMedia()
    {
    	return $this->belongsTo(Media::class, 'media_id');
    }
}
