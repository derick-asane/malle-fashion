<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Session;
use App\Models\User;
use App\Models\Order;

use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{


    public function create()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $user = User::where('email', $credentials['email'])->first();

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            
            // Authentication failed
            return back()->withErrors(['email' => 'Invalid email or password']);

        }


        if($user){
             Auth::login($user);


            if($user->role ==='client'){
                return redirect()->route('client.home')->with('login successful'); 
            }else{
                $usersCount = User::count();
                $ordersCount = Order::count();
                $deliveredOrdersCount = Order::where('status', 'delivered')->count();

                
                return redirect()->route('admin.dashboard')->with(compact('usersCount', 'ordersCount', 'deliveredOrdersCount'))->with('message', 'Login successful');
            }
        }else{
            // Handle the case where the user is not found
        return back()->withErrors(['email' => 'User not found']);
        }
       
        
    }

    public function logout()
    {
        // Clear the session data
        Session::flush();

        Auth::logout();

        //Redirecting to the login page
        return redirect()->route('loginform');
    }
}
