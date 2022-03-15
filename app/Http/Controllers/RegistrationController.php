<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;

class RegistrationController extends Controller
{
    public function __construct(){
        $this->middleware(['guest']);
    }

    public function create(){
        return view('register.create');
    }

    // This function registers a user and logs the user in
    public function store(RegisterRequest $request){
        $data = $request->validated();
        $user = User::create($data);
        auth()->login($user);
        return redirect('/')->with('success', 'Your account has been created.');
    }
}
