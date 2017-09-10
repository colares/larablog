<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrationsController extends Controller
{
    public function create()
    {
        return view('registrations.create');
    }

    public function store()
    {
        // validate
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);

        // create and save
//          $user = User::create(request(['name', 'email', 'password']));
          $user = User::create([
              'name' => request('name'),
              'email' => request('email'),
              'password' => bcrypt(request('password'))
          ]);

        // sign them in
        // Auth::login($user);
        // usando uma helper function, a gente não precisa colocar mais um use na classe:
        auth()->login($user);

        // redirect to the home page
        // Para ->home() funcionar, você precisa dizer nomear a rota que deseja chamar de home
        return redirect()->home();


    }
}
