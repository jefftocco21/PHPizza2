<?php

namespace App\Http\Controllers;

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
        if(auth()->attempt($attributes)){
            session()->regenerate();
            return redirect('/')->with('success', 'Welcome Back'); //redirect with success flash message
        }

        return back()
            ->withInput() //keep the input
            ->withErrors(['email' => 'Provided credentails could not be verified.']); //$errors
    }
}
