<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Auth;

use Session;

use App\Admin;

use App\Profile;

use App\User;

use App\Setting;

use CountryState; 

class AdminProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
        $profile = Profile::where('admin_id', Auth::user()->id)->first();

        $countries = CountryState::getCountries();

        $states = CountryState::getStates('NG');

        return view('admin.profile.edit')->with('admin', Auth::user())
                                         ->with('profile', $profile)
                                         ->with('countries', $countries)
                                         ->with('states', $states)
                                         ->with('settings', Setting::first());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'username' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
            'sex' => 'required',
            'dob' => 'required',
            'state' => 'required',
            'nationality' => 'required',
        ]);

        $admin = Auth::user();

        $admin->name = $request->name;
        $admin->username = $request->username;
        $admin->email = $request->email;
        $admin->profile->phone_number = $request->phone_number;
        $admin->profile->address = $request->address;
        $admin->profile->sex = $request->sex;
        $admin->profile->dob = $request->dob;
        $admin->profile->state = $request->state;
        $admin->profile->nationality = $request->nationality;

        $admin->save();
        $admin->profile->save();


        if($request->has('password'))
        {
            $this->validate($request, [
                'password' => 'min:6',
            ]);

            $admin->password = bcrypt($request->password);

            $admin->save();
        }

        Session::flash('success', 'Your profile has been updated successfully');
        return redirect()->back();
    }

    // public function getCustomerProfile()
    // {
    //      $profile = Profile::whereNotNull('user_id')->get();

    //     return view('admin.profile.customer_profile')->with('allprofile', $profile)
    //                                                  ->with('settings', Setting::first());
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
