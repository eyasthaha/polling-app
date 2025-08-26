@extends('layouts.app')

@section('content')
    <h2>Poll</h2>
    
    <hr>
    <form method="POST" action="{{ route('polls.vote') }}">
        @csrf
        <input type="hidden" name="poll_id" value="{{ $poll->id }}">
        <div class="mb-3">
            <label for="title" class="form-label">Poll Title</label>
            <h3>{{$poll->title}}</h3>
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Poll Description {{$poll->user_vote}}</label>
            <h3>{{$poll->description}}</h3>
        </div>
        <div class="row">
            @foreach ($poll['options'] as $item)
                <div class="col-md-6 mb-3">
                    <input class="form-check-input" type="radio" name="option" id="flexRadioDefault1" value="{{ $item->id }}" required {{$poll->userVote ? 'disabled' : ''}} {{$poll->userVote && $poll->userVote->option_id == $item->id ? 'checked' : ''}}>
                    <label class="form-check-label" for="flexRadioDefault1">{{$item->option}}</label>
                </div>
            @endforeach
    
        </div>
        <button type="submit" class="btn btn-primary" {{$poll->userVote ? 'disabled' : ''}}>Submit</button>
    </form>
    
@endsection