@extends('layouts.app')
@section('title', $tasks->title)

@section('content')

<div class="mb-4">
        <a href="{{ route('tasks.index') }}" class="link">← Go back to the tasks list!</a>
</div>

<p class="mb-4 text-slate-700">{{$tasks->description}}</p>

@if($tasks->long_description)
    <p>{{$tasks->long_description}}</p>
@endif

<p class="mb-4 text-sm text-slate-500">{{$tasks->created_at->diffForHumans() }} • {{$tasks->updated_at->diffForHumans() }}</p>


<p>
    @if($tasks->completed)
    <span class="font-medium text-green-500">Completed</span>
    @else
    <span class="font-medium text-red-500">Not completed</span> 
    @endif
</p>

<div class="flex gap-2">
    <a href="{{ route('tasks.edit', ['tasks' => $tasks->id])}}" 
        class="btn">Edit </a>

<form method="POST" action="{{ route('tasks.toggle-complete', ['id' => $tasks->id])}}">
    @csrf
    @method('PUT')
    <button type="submit" class="btn">
        Mark as {{ $tasks->completed ? 'not completed' : 'completed' }}
    </button>
</form>

    <form action="{{ route('tasks.destroy', ['tasks' => $tasks->id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn">Delete</button>
    </form>
</div>
@endsection
