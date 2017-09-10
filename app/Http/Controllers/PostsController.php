<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    /**
     * PostsController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index() {
        $posts = Post::latest();

        if ($month = request('month')) {
            $posts->whereMonth('created_at', Carbon::parse($month)->month);
        }

        if ($year = request('year')) {
            $posts->whereYear('created_at', $year);
        }

        $posts = $posts->get();


        $archives = Post::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
            ->groupBy('year', 'month')
            ->orderByRaw('year, month DESC')
            ->get()
            ->toArray();


        return view('posts.index', compact('posts', 'archives'));
    }

    public function show(Post $post) {
        return view('posts.show', compact('post'));
    }

    public function create() {
        // tentar acessa isso deslogado. acho qque o middleware auth tenta acessar o endpoint com o name login
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

        // Antes era assim:
        // Post::create(request(['title', 'body', ]));
        // Agora precisamos informar o usuário logado como criador do post
        // Opção 1:
//        Post::create([
//            'title' => request('title'),
//            'body' => request('body'),
//            //'user_id' => auth()->user()->id
//            // Que é a mesma coisa que:
//            'user_id' => auth()->id()
//            // E já que adicionou user_id, tem que adicionar o fillable
//            //  protected $fillable = ['title', 'body', 'user_id'];
//        ]);

        // Do ponto de vista do cliente, ele pode pedir
        // "O usuário publica um novo artigo"
        // O código pode refletir isso:
        auth()->user()->publish(
            new Post(request(['title', 'body']))
        );

        return redirect('/');
    }
}
