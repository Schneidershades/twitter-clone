<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\UserResource;
use App\Http\Resources\MediaCollection;

class TweetResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'body' => $this->body,
            'original_tweet' => new TweetResource($this->originalTweet),
            'likes_count' => $this->likes->count(),
            'retweets_count' => $this->retweets->count(),
            'user' => new UserResource($this->user),
            'media' => new MediaCollection($this->media),
            'type' => $this->type,
            'created_at' => $this->created_at->timestamp,
        ];
    }
}
