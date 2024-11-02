@extends('layouts.app')
@section('title', 'The list of tasks')

@section('content')
      
<div>
  <nav class="mb-5">
    <a href="{{ route('create') }}" class="link">  Add Task</a>
  </nav>
</div>
      <div>
        @if (count($tasks))
            @foreach ($tasks as $task)
                <div><a href="{{ route('tasks.show', ['tasks' => $task->id]) }}"
                  @class(['font-bold', 'line-through' => $task->completed])>{{ $task->title }}</a></div>
            @endforeach    
        @else
          <div>There are no tasks!</div>     
        @endif

        {{-- @endforelse --}}
      </div>
      <div>
       
      <nav class="mt-4"> {{ $tasks->links() }} </nav>
    </div>

      
      @endsection
   


   

