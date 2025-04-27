<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {
        //validate
        $validatedAttributes = request()->validate([
            'first_name' => ['required', 'min:3'],
            'last_name' => ['required', 'min:3'],
            'email' => ['required', 'email'],
            'password' => ['required', Password::min(6), 'confirmed'],//confirmed means that the password and password_confirmation fields must match
        ]);

        //create a new user
        $user = User::create($validatedAttributes);

        //log the user in
        Auth::login($user);

        //redirect to the home page
        return redirect('/jobs');
    }
}

