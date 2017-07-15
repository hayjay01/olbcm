<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Setting;

use Auth;

use Session;

class FrontEndController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    // public function index()
    // {
    //     return view('welcome')->with('settings', Setting::first());
    // }

    /*login*/
    public function login(Request $request)
    {
        //dd($request->all());
        /*validation*/
        $this->validate($request, [
            'username_or_email' => 'required',
            'password' => 'required',
            ]);

        //dd($request->all());

      if (Auth::attempt(['username' => $request->username_or_email, 'password' => $request->password], $request->remember)) {

            Session::flash('success', 'Welcome Customer');

            return redirect()->route('customer.home');

        } 

        elseif (Auth::attempt(['email'=> $request->username_or_email, 'password' => $request->password], $request->remember)) {

            Session::flash('success', 'Welcome Customer');

            return redirect()->route('customer.home'); 
        } 


        else {
               
               Session::flash('error', 'Your login credentials are incorrect!!!');

               return redirect()->back();

        }
    }
    
}
