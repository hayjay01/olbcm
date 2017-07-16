<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Admin;

use Auth;

use App\AccountType;

use App\Account;

use App\User;

use App\Role;

use App\Profile;

use App\Setting;

use App\Balance;

use App\Transaction;

use Session;

class AdministratorsController extends Controller
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
        return view('admin.dashboard.index')->with('customer_count', User::all()->count()-1)
                                            ->with('account_count', Account::all()->count())
                                            ->with('account_type_count', AccountType::all()->count())
                                            ->with('transaction_count', Transaction::all()->count())
                                            ->with('admin_count', Admin::all()->count())
                                            ->with('settings', Setting::first());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(AccountType::all()->count() === 0)
        {
            Session::flash('info', 'You need to have account types before you can create a customer');

            return redirect()->route('account.create');
        }
        return view('admin.customer.create')->with('account_type', AccountType::all())
                                            ->with('settings', Setting::first());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());

        $this->validate($request, [
            'name' => 'required|regex:/^[a-zA-Z ]+$/',
            'email' => 'required|email|unique:users',
            'account_type_id' => 'required',
            'account_number' => 'required|regex:/^[0-9]{10}+$/|unique:accounts', 
            'account_balance' => 'required|min:2'
            ]);

        //dd($request->all());
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt('password'),
            ]);

        $account = AccountType::where('id', $request->account_type_id)->first();

        $account = Account::create([
            'account_type_id' => $request->account_type_id,
            'user_id' => $user->id,
            'account_number' => $request->account_number,
            'account_name' => $account->name,
            'account_balance' => $request->account_balance,
        ]);

        $role = Role::create([
            'user_id' => $user->id,
            'customer' => 1,
            'guest' => 0,
            ]);
        
        $profile = Profile::create([
            'user_id' => $user->id,
        ]);

        Session::flash('success', 'Account Updated Successfully');
        return redirect()->back();
    }

    public function allUser()
    {
        if(User::all()->count() === 0)
        {
            Session::flash('info', 'You havent registered a customer, please proceed to doing so');

            return redirect()->route('user.create');
        }
        return view('admin.customer.index')->with('user', User::all())
                                            ->with('settings', Setting::first());
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = User::find($id);

        $account = Account::where('user_id', $id)->first();

        $role = Role::where('user_id', $id)->first();

        $transaction = Transaction::where('user_id', $id)->get();

        $balance = Balance::where('user_id', $id)->first();

        foreach($transaction as $transactions)
        {
            $transactions->delete();
        }

        if(!empty($balance))
        {
            $balance->delete();
        }
        
        //$transaction->delete();

        $customer->delete();

        $customer->profile->delete();

        $account->delete();

        $role->delete();

        Session::flash('success', 'Deleted successfully');

        return redirect()->back();
    }

    public function logout()
    {

        Auth::guard('admin')->logout();

        return redirect()->route('admin_login');
    }
}
