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
        $polls = $this->pollService->pollsList();

        return view('dashboard.polls.index', compact('polls'));
    }

    public function create()
    {
        $isEdit = false;
        return view('dashboard.polls.create',compact('isEdit'));
    }

    /*
    Store a newly created resource in storage.
    */
    
    public function store(PollRequest $request)
    {
        
        $this->pollService->register($request->validated());        

        return redirect()->route('polls.index')->with('success', 'Poll created successfully.');

    }

    //Admin Edit Poll
    public function edit($id)
    {
        $poll = Polls::with('options')->findOrFail($id);
        $isEdit = true;
        return view('dashboard.polls.create', compact('poll', 'isEdit'));
    }

    //Admin Update Poll
    public function update(PollRequest $request, $id)
    {
        $poll = Polls::findOrFail($id);
        $poll->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ]);

        //also can be able to add option update for now it will delete and add new options
        $poll->options()->delete();

        foreach ($request->input('options') as $option) {
            $poll->options()->create(['option' => $option]);
        }
        return redirect()->route('polls.index')->with('success', 'Poll updated successfully.');
    }

    //Show Poll to User
    public function show($id)
    {
        $poll = $this->pollService->getPollWithUserVote($id, Auth::user());
        
        return view('polls_view', compact('poll'));
    }

    //Delete Poll
    public function destroy($id)
    {
        $poll = Polls::findOrFail($id);
        $poll->delete();
        return redirect()->route('polls.index')->with('success', 'Poll deleted successfully.');
    }

    //User Vote
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
