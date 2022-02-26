<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Cofflux | Register'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => ['required', 'email:dns', 'unique:users'],
            'password' => ['required', 'min:3']
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        // $request->session()->flash('success', 'Registration Succesfully !');

        return redirect('/login')->with('success', 'Registration Succesfully !');
    }
}
