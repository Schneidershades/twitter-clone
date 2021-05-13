<?php

namespace App\Http\Controllers\Api\Tweets;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tweets\TweetStoreRequest;
use App\Events\Tweet\TweetWasCreated;
use App\Tweets\TweetType;
use App\Models\TweetMedia;

class TweetController extends Controller
{
	public function __construct()
	{
		$this->middleware(['auth:sanctum']);
	}

    public function store (TweetStoreRequest $request)
    {
    	$tweet = $request->user()->tweets()->create(
    		array_merge($request->only('body'), [
    			'type' => TweetType::TWEET
    		])
    	);

        foreach ($request->media as $id) {
            $tweet->media()->save(TweetMedia::find($id));
        }

    	broadcast(new TweetWasCreated($tweet));
    }
}
