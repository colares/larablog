<?php

Route::get('/', 'PostsController@index');
Route::get('/posts/create', 'PostsController@create');
//Route::get('/posts/{post}', 'PostsController@show');

// use App\Task;

// Route::get('/tasks', 'TasksController@index');
// Route::get('/tasks/{task}', 'TasksController@show');