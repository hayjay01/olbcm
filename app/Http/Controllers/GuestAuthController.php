<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 

use Session;

use App\User;

use Auth;

class GuestAuthController extends Controller
{
        /*login*/
    public function login(Request $request)
    {
        //dd($request->all());
        /*validation*/
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
            ]);

        //dd($request->all());

      if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {

            Session::flash('success', 'Welcome Guest');

            return redirect()->route('home');

        }  
        else {
               
               Session::flash('error', 'Your login credentials are incorrect!!!');

               return redirect()->back();

        }
    }
}
