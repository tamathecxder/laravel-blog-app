<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() {
        return view('register.index');
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|unique:users|min:5|max:30',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:255',
            'cpassword' => 'required|same:password',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        $register = User::create($validatedData);

        if ( $register ) {
            return redirect('/login')->with('success', 'You have now registered, please continue to login down below!');
        } else {
            return redirect()->back()->with('errors', 'Registration failed!');
        }
    }
}
