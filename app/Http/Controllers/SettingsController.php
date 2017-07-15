<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Setting;

use Session;

use App\User;

use Auth;

class SettingsController extends Controller
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
        return view('admin.settings.settings')->with('settings', Setting::first());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'site_contact' => 'required',
            'site_address' => 'required',
            'site_facebook' => 'required|url',
            'site_twitter' => 'required|url',
            'site_linkedIn' => 'required|url',
            'about' => 'required',
        ]);

        $settings = Setting::first();

        $settings->site_title = $request->name;
        $settings->site_email = $request->email;
        $settings->site_contact = $request->site_contact;
        $settings->site_address = $request->site_address;
        $settings->site_facebook = $request->site_facebook;
        $settings->site_twitter = $request->site_twitter;
        $settings->site_linkdn = $request->site_linkedIn;
        $settings->about = $request->about;

        $settings->save();

        Session::flash('success', 'Site Settings updated successfully');

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
