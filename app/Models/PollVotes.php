<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PollVotes extends Model
{
    protected $fillable = ['poll_id', 'option_id', 'user_id'];
}
