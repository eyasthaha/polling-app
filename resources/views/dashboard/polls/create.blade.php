@extends('dashboard.layout')

@section('content')
    <h2>{{$isEdit ? 'Edit' :'Create'}} Poll</h2>
    <form method="POST" action="{{ $isEdit ? route('polls.update', $poll->id) : route('polls.store') }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Poll Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{$isEdit ? $poll->title : ''}}" required>
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Poll Description</label>
            <input type="text" class="form-control" id="description" name="description" value="{{$isEdit ? $poll->description : ''}}" required>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="options" class="form-label">Option A</label>
                <input type="text" class="form-control" id="options" name="options[]" value="{{$isEdit ? $poll->options->get(0)?->option : ''}}" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="options" class="form-label">Options B</label>
                <input type="text" class="form-control" id="options" name="options[]" value="{{$isEdit ? $poll->options->get(1)?->option : ''}}" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="options" class="form-label">Options C</label>
                <input type="text" class="form-control" id="options" name="options[]" value="{{$isEdit ? $poll->options->get(2)?->option : ''}}" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="options" class="form-label">Options D</label>
                <input type="text" class="form-control" id="options" name="options[]" value="{{$isEdit ? $poll->options->get(3)?->option : ''}}" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="options" class="form-label">Options E</label>
                <input type="text" class="form-control" id="options" name="options[]" value="{{$isEdit ? $poll->options->get(4)?->option : ''}}" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">{{$isEdit ? 'Edit' :'Create'}} Poll</button>
    </form>
    
@endsection