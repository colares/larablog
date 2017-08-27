<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function index() {
        return view('posts.index');
    }

    public function show() {
        return view('posts.show');
    }

    public function create() {
        return view('posts.create');
    }

    public function store() {
//        dd(request()->all());
//        dd(request('title'));
//        dd(request(['title', 'body']));

//        $post = new Post;
//        $post->title = request('title');
//        $post->body = request('body');
//        $post->save();
//            ou

//        só funcionará com fillable or guarded no Model
//        e é uma boa prática sempre ter no model
//        Post::create(request()->all());

        // é uma boa prática sempre descrever os parâmetros
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required'
        ]);
        Post::create(request(['title', 'body']));
        return redirect('/');
    }
}
