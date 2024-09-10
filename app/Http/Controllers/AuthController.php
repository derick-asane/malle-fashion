<?php

namespace App\Http\Controllers;

use App\Models\Auth;
use Illuminate\Http\Request;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $user = User::where('email', $credentials['email'])->first();

    if (!$user || !Hash::check($credentials['password'], $user->password)) {
        // Retrieve the authenticated user's information
        $user = Auth::user();
        //store some user informations 
        Session::put('user_name', $user->name);
        // Authentication failed
        return back()->withErrors(['email' => 'Invalid email or password']);
    }

    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
