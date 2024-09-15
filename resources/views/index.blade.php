<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Training</title>
</head>
<body>
    <h1>
        The list of tasks
      </h1>
      
      <div>
        @if (count($tasks))
            @foreach ($tasks as $tasks)
                <div>{{$tasks->title}}</div>
            @endforeach    
        @else
          <div>There are no tasks!</div>     
        @endif
        {{-- @endforelse --}}
      </div>
   
</body>
</html>

   
{{-- <a href="{{ route('tasks.show', ['id' => $task->id]) }}">{{ $task->title }}</a> --}}


