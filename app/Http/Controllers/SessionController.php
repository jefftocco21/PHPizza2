<?php

namespace App\Http\Controllers;
use Illuminate\validation\ValidationException;

class SessionController extends Controller
{
    public function destroy(){
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye!');
    }

    public function create(){
        return view('sessions.create');
    }

    public function store(){
        //validate request
        $attributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        //attempt to authenticate and log in user
        if(!auth()->attempt($attributes)){
            throw ValidationException::withMessages([
                'email' => 'Provided credentials could not be verified.'
            ]);
        }

        session()->regenerate();
        return redirect('/')->with('success', 'Welcome Back'); //redirect with success flash message
    }
}
