<?php

namespace App\Http\Controllers;

use App\Models\Polls;
use App\Services\PollService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    protected $pollService;

    public function __construct(PollService $pollService) {
        $this->pollService = $pollService;
    }
    
    public function index()
    {
        $pollings = Polls::with('options','userVote')->get();

        return view('home',compact('pollings'));
    }

}
