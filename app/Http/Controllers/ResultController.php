<?php

namespace App\Http\Controllers;

use App\Models\Polls;
use Illuminate\Http\Request;

class ResultController extends Controller
{



    public function get($id)
    {

        $poll = Polls::withCount('votes')->find($id); // example poll
        $options = $poll->options()->withCount('votes')->get();

        $labels = $options->pluck('option')->toArray();
        $data   = $options->pluck('votes_count')->toArray();

        return view('dashboard.polls.result', compact('poll', 'labels', 'data'));
    }
}
