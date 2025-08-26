@extends('dashboard.layout')

@section('content')
    <div class="container mt-4">
        <h2>Pollings</h2>
        <ul class="list-group">
            @foreach($polls as $polling)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <div class="d-flex align-items-center mb-2">
                            <span class="material-icons" style="vertical-align: middle;">poll</span>
                            <h3>{{ $polling->title }}</h3>
                        </div>
                        <p>{{$polling->description}}</p>
                    </div>
                    <div class="d-flex gap-2">
                        {{-- <a href="{{route('polls.detail',$polling->id)}}" class="btn btn-primary btn-sm">View</a> --}}
                        <a href="{{route('polls.edit',$polling->id)}}" class="btn btn-primary btn-sm">Edit/View</a>                        
                        <form action="{{ route('polls.destroy',$polling->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>            
                        <a href="{{}}" class="btn btn-success btn-sm">Result</a>                        
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

    <!-- Material Icons CDN -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
@endsection