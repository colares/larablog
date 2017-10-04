<?php

namespace App\Http\Requests;

use App\Mail\Welcome;
use App\User;
use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ];
    }

    public function persist()
    {
        // como aqui é uma requeste, posso usar $this-> em vez de request
//          $user = User::create(request(['name', 'email', 'password']));
        // lembrando que o código acima é igual a
        //          $user = User::create(request()->only(['name', 'email', 'password']));
        // então:
        $user = User::create(
            $this->only(['name', 'email', 'password'])
        );


        // sign them in
        // Auth::login($user);
        // usando uma helper function, a gente não precisa colocar mais um use na classe:
        auth()->login($user);


        \Mail::to($user)->send(new Welcome($user));

    }
}