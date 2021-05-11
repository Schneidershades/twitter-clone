<?php

namespace App\Http\Controllers\Api\Media;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TweetMedia;
use App\Http\Resources\TweetMediaCollection;
use App\Http\Requests\Media\MediaStoreRequest;

class MediaController extends Controller
{
    public function __construct()
    {
    	// $this->middleware(['auth:airlock']);
    }

    public function store(MediaStoreRequest $request)
    {
    	$result = collect($request->media)->map(function ($media) {
    		return $this->addMedia($media);
    	});

    	return new TweetMediaCollection($result);
    }

    protected function addMedia($media)
    {
    	$tweetMedia = TweetMedia::create([]);

    	$tweetMedia->baseMedia()
    		->associate($tweetMedia->addMedia($media)->toMediaCollection())
    		->save();

    	return $tweetMedia;
    }
}
