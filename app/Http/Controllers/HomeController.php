<?php

namespace App\Http\Controllers;

use App\Models\Polls;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $pollings = Polls::with('options','userVote')->get();

        return view('home',compact('pollings'));
    }

}
