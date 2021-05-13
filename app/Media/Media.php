<?php

namespace App\Media;

use Spatie\MediaLibrary\MediaCollections\Models\Media as BaseMedia;
use App\Media\MimeTypes;

class Media extends BaseMedia
{
	public function type()
	{
		return MimeTypes::type($this->mime_type);
	}
}