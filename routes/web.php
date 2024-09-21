<?php

use Illuminate\Support\Facades\Route;
use App\Models\Task;
use Illuminate\Http\Response;
use Illuminate\Http\Request;



    
    Route::get('/', function ()  {
        return redirect()->route('tasks.index');
    });

    Route::get('/tasks', function ()  {
        return view('index', [
          'tasks' =>  \App\Models\Task::latest()->where('completed', false)->get()
        ]);
    })->name('tasks.index');

    Route::view('/tasks/create', 'create');

    Route::get('/tasks/{id}', function ($id)  {
        return view('show', ['tasks' =>  \App\Models\Task::findOrFail($id)]);
    })->name('tasks.show');

    Route::post('/tasks', function(Request $request) {
        $data = $request->validate([
            'title' => 'required|max:225',
            'description' => 'required',
            'long_description' => 'required',
        ]);

        $tasks = new Task;
        $tasks -> title = $data['title'];
        $tasks -> description = $data['description'];
        $tasks -> long_description = $data['long_description'];
        $tasks->save();

        return redirect()->route('tasks.show', ['id' => $tasks->id])
        ->with('success', "Task created successfully!");
    })->name('tasks.store');
    
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
