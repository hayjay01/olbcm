<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Admin;

use Auth;

use Session;

class AdminAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    /*getting the login form*/
    public function getLogin()
    {
        return view('admin_login');
    }

    /*admin login*/
    public function login(Request $request)
    {
        //dd($request->all());
        /*validation*/
        $this->validate($request, [
            'Username_or_email' => 'required',
            'password' => 'required',
            ]);

        //dd($request->all());

      if (Auth::guard('admin')->attempt(['username' => $request->Username_or_email, 'password' => $request->password], $request->remember)) {

            Session::flash('success', 'Welcome Admin');

            return redirect()->route('admin.home');

        } 

        elseif (Auth::guard('admin')->attempt(['email'=> $request->Username_or_email, 'password' => $request->password], $request->remember)) {

            Session::flash('success', 'Welcome Admin');

            return redirect()->route('admin.home'); 
        } 


        else {
               
               Session::flash('error', 'Your login credentials are incorrect!!!');

               return redirect()->back();

        }
    }


}
