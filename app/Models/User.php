<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Follower;
use App\Models\Tweet;
use App\Models\Like;
use App\Tweets\TweetType;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable ;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function avatar()
    {
        return 'https://www.gravatar.com/avatar/' . md5($this->email) . '?d=mp';
    }

    public function hasLiked(Tweet $tweet)
    {
        return $this->likes->contains('tweet_id', $tweet->id);
    }

    public function tweets ()
    {
        return $this->hasMany(Tweet::class);
    }

    public function following ()
    {
        return $this->belongsToMany(
            User::class, 'followers', 'user_id', 'following_id'
        );
    }


    public function followers ()
    {
        return $this->belongsToMany(
            User::class, 'followers', 'following_id', 'user_id'
        );
    }

    public function tweetsFromFollowing ()
    {
        return $this->hasManyThrough(
            Tweet::class, Follower::class, 'user_id', 'user_id', 'id', 'following_id'
        );
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function retweets()
    {
        return $this->hasMany(Tweet::class)
            ->where('type', TweetType::RETWEET)
            ->orWhere('type', TweetType::QUOTE);
    }

}
