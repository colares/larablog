<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function __construct()
    {
        // Isso cria um quest filter
        // Apenas convidados (usuários NÃO logados) conseguem
        // passar por esse filtro
        $this->middleware('guest', ['except' => 'destroy']);
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        // attempt to authenticate the user
        // if not, redirect back
        // if so, sign them in
        // redirect to the home page
        if (! auth()->attempt(request(['email', 'password'])) ) {
            return back()->withErrors([
                'message' => 'Please check you credentials and try again.'
            ]);
        }
        return redirect()->home();
    }


    public function destroy() {
        auth()->logout();
        return redirect()->home();
    }

}
