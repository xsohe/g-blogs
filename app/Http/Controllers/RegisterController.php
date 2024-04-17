<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index() {
        return view('register.index', [
            'title' => 'Registered'
        ]);
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => ['required', 'min:3', 'max:255'],
            'username' => ['required', 'unique:users', 'min:3', 'max:255'],
            'email' => ['required', 'email:dns'],
            'password' => ['required', 'min:8']
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);
        
        User::create($validatedData);

        return redirect('/login')->with('success', 'Registration successfull, please login!');
    }
}
