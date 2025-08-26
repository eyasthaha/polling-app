<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PollVotes extends Model
{
    use SoftDeletes;
    protected $fillable = ['poll_id', 'option_id', 'user_id', 'created_at', 'updated_at', 'deleted_at'];
}
