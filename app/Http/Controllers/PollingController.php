<?php

namespace App\Http\Controllers;

use App\Http\Requests\PollRequest;
use App\Models\Polls;
use App\Models\PollVotes;
use App\Services\PollService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PollingController extends Controller
{

    protected $pollService;

    public function __construct(PollService $pollService) {
        $this->pollService = $pollService;
    }

    public function index()
    {
        return view('dashboard.polls.create');
    }

    /*
    Store a newly created resource in storage.
    */
    
    public function store(PollRequest $request)
    {
        
        $this->pollService->register($request->validated());        

        return redirect()->route('polls.index')->with('success', 'Poll created successfully.');

    }

    public function show($id)
    {
        $poll = $this->pollService->getPollWithUserVote($id, Auth::user());
        
        return view('polls_view', compact('poll'));
    }

    public function vote(Request $request)
    {
        $request->validate([
            'poll_id' => 'required|exists:polls,id',
            'option' => 'required|exists:poll_options,id',
        ]);

        PollVotes::create([
            'poll_id' => $request->input('poll_id'),
            'option_id' => $request->input('option'),
            'user_id' => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'Vote recorded successfully.');
    }
    
}
