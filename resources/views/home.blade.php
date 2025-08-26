@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2>Pollings</h2>
        <ul class="list-group">
            {{-- @foreach($pollings as $polling)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <span class="material-icons" style="vertical-align: middle;">poll</span>
                        {{ $polling->title }}
                    </div>
                    <a href="{{ route('pollings.show', $polling->id) }}" class="btn btn-primary btn-sm">View</a>
                </li>
            @endforeach --}}
        </ul>
    </div>

    <!-- Material Icons CDN -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
@endsection