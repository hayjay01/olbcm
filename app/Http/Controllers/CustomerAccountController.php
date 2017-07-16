<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\AccountType;

use App\Account;

use App\Setting;

use App\User;

use Session;

class CustomerAccountController extends Controller
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
        return view('admin.account.index')->with('settings', Setting::first());;
    }

   public function update(Request $request, $id)
   {
       
       $this->validate($request, [
           'name' => 'required',
           //'email' => 'required|email|unique:users',
           
           'account_type_id' => 'required',
           //'account_number' => 'required|regex:/^[0-9]{10}+$/|unique:accounts',
       ]);

        //dd($request->all());
       $customer = User::find($id);

       if($customer->email !== $request->email)
       {
            $this->validate($request, [
                'email' => 'required|email|unique:users',
            ]);

            $customer->email = $request->email;

            $customer->save();
       }

       if($customer->username !== $request->username)
       {
            $this->validate($request, [
                'username' => 'required|unique:users',
            ]);

            $customer->username = $request->username;

            $customer->save();
       }

       if($customer->profile->phone_number !== $request->phone_number)
       {
            $this->validate($request, [
                'phone_number' => 'required|unique:profiles|regex:/^[0-9]+$/',
            ]);

            $customer->profile->phone_number = $request->phone_number;

            $customer->profile->save();
       }

       $account = Account::where('user_id', $id)->first();

       $customer->name = $request->name;
       
       if($account->account_number !== $request->account_number)
       {
           $this->validate($requeat, [
                'account_number' => 'required|regex:/^[0-9]{10}+$/|unique:accounts',
           ]);

           $account->account_number = $request->account_number;

           $account->save();
           
       }

       $account_type = AccountType::where('id', $request->account_type_id)->first();

       $account->account_type_id = $request->account_type_id;
       $account->account_name = $account_type->name;
       
       $customer->save();
       
       $account->account_balance = $request->account_balance;       
       $account->save();

       if($request->has('password'))
       {
           $this->validate($request, [
               'password' => 'min:6',
           ]);

           $customer->password = bcrypt($request->password);

           $customer->save();
       }
       
       Session::flash('success', 'Account updated for successfully');

       return redirect()->route('users');
       
   }

   public function getCustomerAccount($id)
    {
        $customer = User::find($id);
        $account_type = AccountType::all();
        $account = Account::where('user_id', $id)->first();
        // dd($account);
        return view('admin.account.edit')->with('customer', $customer)
                                         ->with('account_type', $account_type)
                                        //  ->with('account_type', $account_type)
                                         ->with('account', $account)
                                         ->with('settings', Setting::first());;
    }


}
