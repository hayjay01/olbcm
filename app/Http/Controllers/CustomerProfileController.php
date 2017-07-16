<?php

namespace App\Http\Controllers;

use App\Setting;

use Auth;

use Session;

use App\Profile;

use CountryState;

use App\Account;

use App\User;

use Illuminate\Http\Request;

class CustomerProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('customer');
    }
    
    public function index()
    {
        $countries = CountryState::getCountries();

        $states = CountryState::getStates('NG');
        $users = User::where('id',auth::user()->id)->first();
        // dd($users);
        // $account = Account::where('id', Auth::user()->accounts);
        // dd($account);
        return view('customer.dashboard.profile.index')->with('settings', Setting::first())
                                                       ->with('country', $countries)
                                                       ->with('state', $states)
                                                       ->with('users', $users);
                                                       
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
    public function update(Request $request, $id)
    {
        //dd($request->all());
        //dd($request->all());
        $this->validate($request, [
            'address' => 'required',
            'sex' => 'required',
            'dob' => 'required',
            'state' => 'required',
            'nationality' => 'required',
        ]);

        $customer = Profile::where('user_id', $id)->first();
        $user = Auth::user();

        $customer->address = $request->address;
        $customer->sex = $request->sex;
        $customer->dob = $request->dob;
        $customer->state = $request->state;
        $customer->nationality = $request->nationality;

        $customer->save();


        if($request->has('phone_number'))
        {
            $this->validate($request, [
                'phone_number' => 'required|regex:/^[0-9]{11}+$/',
            ]);

            $customer->phone_number = $request->phone_number;

            $customer->save();
        }

        if($request->has('username'))
        {
            $this->validate($request, [
                'username' => 'required|unique:users',
            ]);

            $user->username = $request->username;

            $user->save();
        }

        Session::flash('success', 'Your profile has been updated successfully');
        return redirect()->back();
    }

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
