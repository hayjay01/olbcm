<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\AccountType;

use App\Account;

use App\User;

use App\Setting;

use Session;

class AccountController extends Controller
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
        
        if(AccountType::all()->count() === 0)
        {
            Session::flash('info', 'You have not created an account type, please create one');

            return redirect()->route('account.create');
        }
        return view('admin.account_type.index')->with('account_type', AccountType::all())
                                                ->with('settings', Setting::first());;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.account_type.create')->with('settings', Setting::first());;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:account_types',
        ]);

        AccountType::create([
            'name' => $request->name,
        ]);

        Session::flash('success', 'Account type created successfully');

        return redirect()->back();
        
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
        $account_type = AccountType::find($id);

        return view('admin.account_type.edit')->with('account_type', $account_type)
                                                ->with('settings', Setting::first());;
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
        $this->validate($request, [
            'name' => 'required',
        ]);

        $account_type = AccountType::find($id);

        $account_type->name = $request->name;

        $account_type->save();

        Session::flash('success', 'Updated Successfully');

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
        $account_type = AccountType::find($id);

        // $account = Account::where('acount_type_id', $id)->get();

        // foreach($account as $accounts)
        // {
        //     $accounts->delete();
        // }

        $account_type->delete();

        Session::flash('success', 'Deleted Successfully');

        return redirect()->back();
    }

    
}
