<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Account;

use App\User;

use App\Admin;

use App\Transaction;

use App\Balance;

use App\Setting;

use Auth;

use Session;

class AdminTransactionsController extends Controller
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
        return view('admin.transaction.search')->with('settings', Setting::first());;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $user = User::where('id', $id)->first();

        $balance = Balance::where('user_id', $id)->first();

        //$transaction = Transaction::where('user_id', $id)->orderBy('created_at', 'desc')->first();

        $account = Account::where('user_id', $id)->first();

        //$balance = Account::where('user_id', $id)->orderBy('created_at', 'desc')->first();

        return view('admin.transaction.create')->with('user', $user)
                                               ->with('account', $account)
                                               ->with('balance', $balance)
                                               ->with('settings', Setting::first());;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $this->validate($request, [
            'search' => 'required',
        ]);

        $search = $request->search;

        $account = Account::where('account_number', 'LIKE', "%{$search}%")->get();

        return view('admin.transaction.result')->with('account', $account)
                                                ->with('settings', Setting::first())
                                               ->with('title', 'Search Result for:' . $request->search);

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
    public function store(Request $request, $id)
    {
        $transaction = Transaction::where('user_id', $id)->first();

        $balance = Balance::where('user_id', $id)->first();

        if($request->has('withdrawal'))
        {
            $this->validate($request, [
                'withdrawal' => 'required|regex:/^[0-9]+$/',
            ]);

            $balance = Balance::where('user_id', $id)->first();

            if($balance->balance > $request->withdrawal)
            {
                
                $new_balance = $balance->balance - $request->withdrawal;

                $transact = Transaction::create([
                    'user_id' => $id,
                    'withdrawal' => $request->withdrawal,
                ]);

                $balance->user_id = $id;
                $balance->balance = $new_balance;

                $balance->save();

                Session::flash('success', 'Withdrawal Transaction was recorded Successfully');

                return redirect()->back();

            }
            else
            {
                Session::flash('error', 'Insuffucient balance to perform this operation');

                return redirect()->back();
            }

        }else if($request->has('deposit'))
        {
            $this->validate($request, [
                'deposit' => 'required|regex:/^[0-9]+$/',
            ]);

            if(empty($balance->balance))
            {
                $transact = Transaction::create([
                    'user_id' => $id,
                    'deposit' => $request->deposit,
                ]);

                $balance = Balance::create([
                    'user_id' => $id,
                    'balance' => $request->deposit,
                ]);

                Session::flash('success', 'Deposit Transaction was recorded Successfully');

                return redirect()->back();
            }else
            {
                $balance = Balance::where('user_id', $id)->first();
                $new_balance = $balance->balance + $request->deposit;
                $transact = Transaction::create([
                    'user_id' => $id,
                    'deposit' => $request->deposit,
                ]);

                $balance->user_id = $id;
                $balance->balance = $new_balance;

                $balance->save();

                Session::flash('success', 'Deposit Transaction was recorded Successfully');

                return redirect()->back();
            }

        }else
        {
            Session::flash('error', 'You must either make a deposit or withdrawal');

            return redirect()->back();
        }
        
    }

    public function getSearchAll()
    {
        return view('admin.search.search')->with('settings', Setting::first());;
    }

    public function postSearch(Request $request)
    {
        $this->validate($request, [
            'search' => 'required',
        ]);

        $search = $request->search;

        $account = Account::where('account_number', 'LIKE', "%{$search}%")->get();

        return view('admin.search.result')->with('account', $account)
                                          ->with('title', 'Search Result for:' . $request->search)
                                          ->with('settings', Setting::first());;
    }

    public function getAllTransaction($id)
    {
        $transaction = Transaction::where('user_id', $id)->get();
        $user = User::where('id', $id)->first();
        $balance = Balance::where('user_id', $id)->first();
        $account = Account::where('user_id', $id)->first();
        if($transaction->count() === 0)
        {
            Session::flash('info', 'You have no transaction yet');
            return redirect()->back();
        }

        return view('admin.search.all_transaction')->with('transaction', $transaction)
                                                   ->with('user', $user)
                                                   ->with('balance', $balance)
                                                   ->with('account', $account)
                                                   ->with('settings', Setting::first());;
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
