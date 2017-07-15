<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\User;

use App\Role;

use App\Setting;

use Session;

class CustomerAuthController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function generalLogin()
    {
        // if(!Auth::user()->role->customer())
        // {
        //     return redirect()->back();
        // }

        return view('login');
    }

    public function index()
    {
        if(empty(Auth::user()->role->guest))
        {
            return redirect()->route('welcome');
        }
        return view('welcome')->with('settings', Setting::first());
    }



    public function about()
    {
        if(empty(Auth::user()->role->guest))
        {
            return redirect()->route('welcome');
        }
        return view('about')->with('settings', Setting::first());
    }

    public function contact()
    {
        if(empty(Auth::user()->role->guest))
        {
            return redirect()->route('welcome');
        }
        return view('contact')->with('settings', Setting::first());
    }

    public function error()
    {
        // if(empty(Auth::user()->role->guest))
        // {
        //     return redirect()->route('welcome');
        // }
        return view('customer.dashboard.404')->with('settings', Setting::first());
    }

    

    public function logout()
    {

        Auth::guard('web')->logout();

        return redirect()->route('welcome');
    
    }
}
