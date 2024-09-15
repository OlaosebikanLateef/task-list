@extends('layouts.app')
@section('title', 'The list of tasks')

@section('content')
      
      <div>
        @if (count($tasks))
            @foreach ($tasks as $tasks)
                <div><a href="{{ route('tasks.show', ['id' => $tasks->id]) }}">{{ $tasks->title }}</a></div>
            @endforeach    
        @else
          <div>There are no tasks!</div>     
        @endif
        {{-- @endforelse --}}
      </div>
      @endsection
   


   

