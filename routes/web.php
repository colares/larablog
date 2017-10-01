<?php

// Como fazer um bind no container:
// Fazer referência a qualquer caminho de classe
//App::bind("App\Billing\Stripe", function () {
//    return new \App\Billing\Stripe(config('services.stripe.secret'));
//});
//
//$stripe = resolve('App\Billing\Stripe');
//$stripe2 = resolve('App\Billing\Stripe');
//$stripe3 = resolve('App\Billing\Stripe');
//
//dump($stripe);
//dump($stripe2);
//dd($stripe3);

Route::get('/', 'PostsController@index')->name('home');
Route::get('/posts/create', 'PostsController@create');
Route::post('/posts', 'PostsController@store');
Route::get('/posts/{post}', 'PostsController@show');

Route::post('/posts/{post}/comments', 'CommentsController@store');


Route::get('/register', 'RegistrationsController@create');
Route::post('/register', 'RegistrationsController@store');

Route::get('/login', 'SessionsController@create')->name('login');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');

// use App\Task;

// Route::get('/tasks', 'TasksController@index');
// Route::get('/tasks/{task}', 'TasksController@show');