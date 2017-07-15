@extends('customer.dashboard.layouts.layouts')

@section('content')
    @if($transaction->count() === 0)
        <p class="text-center"><h1>No Transaction Available</h1></p>
    @else
        <div class="row">
                        <!-- column -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-block">
                        <h4>Account Name: {{ Auth::user()->name }}</h4>
                        <br>
                        <h4>Account Number: {{ $account->account_number }}</h4>
                        <br>
                        <h4>Account Type: {{ $account->account_name }}</h4>
                        <br>
                        <h4 class="card-title">Transactions in details</h4>
                        {{-- <h6 class="card-subtitle">Add class <code>.table</code></h6> --}}
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        {{-- <th>#</th> --}}
                                        <th>Deposit (&#8358;)</th>
                                        <th>Withdrawal (&#8358;)</th>
                                        <th>Date and Time of Transactions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($transaction as $transactions)
                                        <tr>
                                            {{-- <td>1</td> --}}
                                            <td>{{ $transactions->deposit }}</td>
                                            <td>{{ $transactions->withdrawal }}</td>
                                            <td>{{ $transactions->created_at->toDayDateTimeString() }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                
                            </table>
                            <p><h4>Your Account Balance : &#8358;{{ $balance->balance }}</h4></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@stop

@section('breadcumb')
<div class="row page-titles">
    <div class="col-md-6 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Profile</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Transaction History for {{ Auth::user()->name }}</li>
        </ol>
    </div>
</div>
@stop