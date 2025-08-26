<?php

namespace App\Services;

use App\Models\Polls;
use App\Models\User;

class PollService
{
    
    public function register(array $data)
    {
        $poll = Polls::create([
            'title' => $data['title'],
            'description' => $data['description'] ?? null,
        ]);

        foreach ($data['options'] as $option) {
            $poll->options()->create(['option' => $option]);
        }

        return $poll;
    }

    public function getPollWithUserVote($pollId, User $user)
    {
        return Polls::with('options','userVote')->findOrFail($pollId);
    }

}