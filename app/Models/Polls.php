<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Polls extends Model
{
    protected $fillable = ['title', 'description'];

    public function options()
    {
        return $this->hasMany(PollOptions::class, 'poll_id');
    }

    public function userVote()
    {
        return $this->hasOneThrough(
                    PollVotes::class,   
                    PollOptions::class, 
                    'poll_id',
                    'option_id',
                    'id',
                    'id'
                )->where('user_id', Auth::id());
    }
}
