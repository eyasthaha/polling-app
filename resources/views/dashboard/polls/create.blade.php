@extends('dashboard.layout')

@section('content')
    <h2>Create New Poll</h2>
    <form method="POST" action="{{ route('polls.store') }}">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Poll Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Poll Description</label>
            <input type="text" class="form-control" id="description" name="description" required>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="options" class="form-label">Option A</label>
                <input type="text" class="form-control" id="options" name="options[]" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="options" class="form-label">Options B</label>
                <input type="text" class="form-control" id="options" name="options[]" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="options" class="form-label">Options C</label>
                <input type="text" class="form-control" id="options" name="options[]" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="options" class="form-label">Options D</label>
                <input type="text" class="form-control" id="options" name="options[]" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Create Poll</button>
    </form>
    
@endsection