
@extends('admin.layouts.layout')

@section('content')
	<div class="col-md-6 col-md-offset-1">
		<div class="content-box-large">
			<div class="panel-heading">
            <div class="panel-title">All Transactions For {{ $user->name }}</div>

        </div>
			<div class="panel-body">
                <h4>Account Name: {{ $user->name }}</h4>
                <br>
                <h4>Account Number: {{ $account->account_number }}</h4>
                <br>
                <h4>Account Type: {{ $account->account_name }}</h4>
                <br>
				<div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            
                            <th>
                                Deposits (&#8358;) 
                            </th>
                            <th>
                                Withdrawals (&#8358;)
                            </th>
                            <th>
                                Date and Time of Transactions
                            </th>
                        </thead>
                        <tbody>
                            @foreach($transaction as $transactions)
                                <tr>
                
                                    <td>
                                        {{ $transactions->deposit }}
                                    </td>
                                    <td>
                                        {{ $transactions->withdrawal }}
                                    </td>
                                    <td>
                                        {{ $transactions->created_at->toDayDateTimeString() }}
                                    </td>
                                   
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <h4 style="text-align: right;"><b>Balance: &#8358;{{ $balance->balance }}.00</b></h4>
                </div>
			</div>
		</div>
	</div>
@stop

@section('footer')
	@include('admin.templates.footer')
@stop