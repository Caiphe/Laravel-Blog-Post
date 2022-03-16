<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function destroy(){
        auth()->logout();
        return redirect('/')->with('success','Good bye');
    }

    public function create(){
        return view('session.create');
    }

    public function store(){
        $data = request()->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(!auth()->attempt($data)){
            throw ValidationException::withMessages([
                'email' => 'Your provided credentials are invalid.'
            ]);
        }

        session()->regenerate();
        return redirect('/')->with('success','you logged in');
    }
}
