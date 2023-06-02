<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('register');
    }
    public function registerpost(Request $request)
    {
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        return redirect()->back()->with('success', 'User created successfully');
    }

    public function login()
    {
        return view('login');
    }
    public function loggedin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (auth::attempt($credentials)) {
            return redirect('/home');
        }
 
        return back()->with('error', 'Error Email or Password');
    }

    public function logout()
    {
        auth::logout();

        return redirect('/login');
    }
}
