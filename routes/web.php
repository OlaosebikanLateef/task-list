<?php

use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CreateController;
use App\Models\Task;
use Illuminate\Http\Response;
use Illuminate\Http\Request;



    
    Route::get('/', function ()  {
        return redirect()->route('tasks.index');
    });

    Route::get('/tasks', function ()  {
        return view('index', [
          'tasks' => Task::latest()->paginate(10)
        ]);
    })->name('tasks.index');
    

    // Route::view('/tasks/create', 'create')->name('tasks.create');

    Route::get('/create', [CreateController::class, 'create'])->name('create');

    Route::get('/tasks/{tasks}/edit', function (Task $tasks)  {
        return view('edit', ['tasks' => $tasks]);
    })->name('tasks.edit');

    Route::get('/tasks/{tasks}', function (Task $tasks)  {
        return view('show', ['tasks' => $tasks]);
    })->name('tasks.show');

    

    Route::post('/tasks', function (TaskRequest $request) {
        // $data = $request->validated();
        // $tasks = new Task;
        // $tasks -> title = $data['title'];
        // $tasks -> description = $data['description'];
        // $tasks -> long_description = $data['long_description'];
        // $tasks->save();

        $tasks = Task::create($request->validated());

        return redirect()->route('tasks.show', ['tasks' => $tasks->id])
        ->with('success', "Task created successfully!");
    })->name('tasks.store');    

    
    Route::put('/tasks/{tasks}', function (Task $tasks, TaskRequest $request) {
        // $data = $request->validated();
        // $tasks -> title = $data['title'];
        // $tasks -> description = $data['description'];
        // $tasks -> long_description = $data['long_description'];
        // $tasks->save();

        $tasks->update($request->validated());

        return redirect()->route('tasks.show', ['tasks' => $tasks->id])
        ->with('success', "Task updated successfully!");
    })->name('tasks.update');

    Route::delete('/tasks/{tasks}', function (Task $tasks) {

        $tasks->delete();

        return redirect()->route('tasks.index')
        ->with('success', "Task deleted successfully!");
    })->name('tasks.destroy');

   
    Route::put('tasks/{id}/toggle-complete', function(Task $tasks){
    $tasks->toggleComplete();

    return redirect()->back()->with('success', 'Task Updated successfully');
    })->name('tasks.toggle-complete');
    
    // Route::get('/xxx', function () {
    //     return 'Hello';
    // })->name('hello');
    // Route::get('/{id}', function ($id) {
    //     return 'One single task';
    // })->name('tasks.show');
    
    // Route::get('/hallo', function () {
    //     return redirect()->route('hello');
    // });
    // Route::get('/xxx', function () {
    //     return 'Hello';
    // })->name('hello');
    
    // Route::get('/greet/{name}', function ($name) {
    //     return 'Hello ' . $name . '!';
    // });
    // Route::get('/hallo', function () {
    //     return redirect()->route('hello');
    // });
    
    // Route::get('/greet/{name}', function ($name) {
    //     return 'Hello ' . $name . '!';
    // });
    
    // Route::fallback(function () {
    //     return 'Still got somewhere!';
    // });
    
    // GET
    // POST 
    // PUT 
    // DELETE 
