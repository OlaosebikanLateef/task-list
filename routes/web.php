<?php

use Illuminate\Support\Facades\Route;



    
    Route::get('/', function ()  {
        return redirect()->route('tasks.index');
    });

    Route::get('/tasks', function ()  {
        return view('index', [
          'tasks' =>  \App\Models\Task::latest()->where('completed', false)->get()
        ]);
    })->name('tasks.index');

    Route::get('/tasks/{id}', function ($id)  {
        return view('show', ['tasks' =>  \App\Models\Task::findOrFail($id)]);
    })->name('tasks.show');
    
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
