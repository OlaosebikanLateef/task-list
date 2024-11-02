@extends('layouts.app')
@section('title', 'Edit Task')
<style>
    .error-message{
        color: red;
        font-size: 0.8rem;
    }
</style>
@section('content')

    <form method="POST" action="{{ route('tasks.update', ['tasks' => $tasks->id]) }}">
    @csrf
    @method('PUT')
    <div>
        <label for="title">
            Title
        </label>
        <input type="text" name="title" id="title" value="{{ $tasks->title}}">
        @error('title')
            <p class="error">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="description">Description</label>
        <textarea name="description" id="description" cols="" rows="5">{{ $tasks->description}}</textarea>
        @error('description')
            <p class="error">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="long_description">Description</label>
        <textarea name="long_description" id="long_description" cols="" rows="10">{{ $tasks->long_description}}</textarea>
        @error('long_description')
        <p class="error">{{ $message }}</p>
    @enderror
    </div>
    <div class="flex items-center gap-2">
        <button type="submit" class="btn">Edit Task</button>
        <a href="{{ route('tasks.index')}}" class="link mx-5"> Cancel</a>
    </div>
</form>
@endsection