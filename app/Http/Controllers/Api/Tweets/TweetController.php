<?php

namespace App\Http\Controllers\Api\Tweets;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tweets\TweetStoreRequest;

class TweetController extends Controller
{
	public function __construct()
	{
		$this->middleware(['auth:sanctum']);
	}

    public function store (TweetStoreRequest $request)
    {
    	$request->user()->tweets()->create($request->only('body'));
    }
}
