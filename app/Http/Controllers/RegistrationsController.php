<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Mail\Welcome;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrationsController extends Controller
{
    public function create()
    {
        return view('registrations.create');
    }

    public function store(RegistrationRequest $request)
    {
        // redirect to the home page
        // Para ->home() funcionar, você precisa dizer nomear a rota que deseja chamar de home
        return redirect()->home();
    }
}
