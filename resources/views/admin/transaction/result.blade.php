
@extends('admin.layouts.layout')

@section('content')
	<div class="col-md-6 col-md-offset-1">
		<div class="content-box-large">
			<div class="panel-heading">
            <div class="panel-title">{{ $title }}</div>

        </div>
			<div class="panel-body">
            @if($account->count() === 0)
                <h1 class="text-center">No customer found for this keyword !!!</h1>
             @else
				<div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <th>
                                Name
                            </th>
                            <th>
                                Account Number
                            </th>
                            <th>
                                Account Type
                            </th>
                            <th>
                                Create Transaction
                            </th>
                        </thead>
                        <tbody>
                            @foreach($account as $accounts)
                                <tr>
                                    <td>
                                        {{ $accounts->user->name }}
                                    </td>
                                    <td>
                                        {{ $accounts->account_number }}
                                    </td>
                                    <td>
                                        {{ $accounts->account_name }}
                                    </td>
                                    <td>
                                        <a href="{{ route('transaction.create', ['id' => $accounts->user->id]) }}" class="btn btn-success btn-sm" >Create Transaction</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
			</div>
		</div>
	</div>
@stop

@section('footer')
	@include('admin.templates.footer')
@stop