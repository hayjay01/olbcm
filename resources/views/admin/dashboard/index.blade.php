@extends('admin.layouts.layout')

@section('content')

<div class="row">

	<div class="col-lg-4">
		<div class="panel panel-info">
			<div class="panel-heading text-center">
				TOTAL NUMBER OF CUSTOMERS
			</div>
			<div class="panel-body text-center">
				<h1>{{ $customer_count }}</h1>
			</div>
		</div>
	</div>

	<div class="col-lg-4">
		<div class="panel panel-success">
			<div class="panel-heading text-center">
				TOTAL NUMBER OF ACCOUNTS
			</div>
			<div class="panel-body text-center">
				<h1>{{ $account_count }}</h1>
			</div>
		</div>
	</div>

	<div class="col-lg-4">
		<div class="panel panel-info">
			<div class="panel-heading text-center">
				TOTAL NUMBER OF ACCOUNT TYPES
			</div>
			<div class="panel-body text-center">
				<h1>{{ $account_type_count }}</h1>
			</div>
		</div>
	</div>

	<div class="col-lg-4">
		<div class="panel panel-info">
			<div class="panel-heading text-center">
				TOTAL NUMBER OF TRANSACTIONS
			</div>
			<div class="panel-body text-center">
				<h1>{{ $transaction_count }}</h1>
			</div>
		</div>
	</div>

	<div class="col-lg-4">
		<div class="panel panel-success">
			<div class="panel-heading text-center">
				TOTAL NUMBER OF ADMINS
			</div>
			<div class="panel-body text-center">
				<h1>{{ $admin_count }}</h1>
			</div>
		</div>
	</div>
</div>

@stop

@section('footer')
	@include('admin.templates.footer')
@stop