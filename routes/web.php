<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/tasks', function () {
    // return view('welcome')->with('name', 'World');

    // rule of thumb: essa aqui é melhor
    $tasks = DB::table('tasks')->get();
    // return $tasks; // retorna um json
    return view('tasks.index', compact('tasks'));
});

Route::get('/tasks/{task}', function ($id) {
    $task = DB::table('tasks')->find($id);
    // return view('tasks/show', compact('task'));
    // ou
    return view('tasks.show', compact('task'));
});

Route::get('about', function() {
    return view('about');
});