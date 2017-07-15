@extends('admin.layouts.layout')

@section('content')
	<div class="col-md-6 col-md-offset-1">
		<div class="content-box-large">
			<div class="panel-heading">
            <div class="panel-title">Make Transaction for: {{ $user->name }}</div>

        </div>
			<div class="panel-body">
				<form action="{{ route('transaction.store', ['id' => $user->id]) }}" method="post">
					{{ csrf_field() }}
					<fieldset>
						<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
							<label>Customer Name</label>
							<input class="form-control" disabled value={{ $user->name }} type="text" name="name">

							@if($errors->has('name'))
								<span class="help-block">{{ $errors->first('name') }}</span>
							@endif
						</div>
						<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
							<label>Customer Email</label>
							<input class="form-control" value="{{ $user->email }}" disabled type="email" name="email">

							@if($errors->has('email'))
								<span class="help-block">{{ $errors->first('email') }}</span>
							@endif
						</div>
						<div class="form-group{{ $errors->has('account_type_id') ? ' has-error' : '' }}">
                            <label>Account Type</label>
                            <select class="form-control" name="account_type_id">
                                <option value="{{ $account->account_type_id }}">{{ $account->account_name }}</option>
                                @if($errors->has('account_type_id'))
                                    <span class="help-block">{{ $errors->first('account_type_id') }}</span>
                                @endif
                            </select>
                        </div>
                        <div class="form-group{{ $errors->has('account_number') ? ' has-error' : '' }}">
                            <label>Account Number</label>
                            <input class="form-control" disabled value="{{ $account->account_number }}" name="account_number" type="text" >

                            @if($errors->has('account_number'))
                                <span class="help-block">{{ $errors->first('account_number') }}</span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('deposit') ? ' has-error' : '' }}">
                            <label>Deposit &#8358;:</label>
                            <input class="form-control" placeholder="Enter Ammount to deposit"  name="deposit" type="text" >

                            @if($errors->has('deposit'))
                                <span class="help-block">{{ $errors->first('deposit') }}</span>
                            @endif
                        </div>
                        @if(!empty($balance->balance))
                        <div class="form-group{{ $errors->has('withdrawal') ? ' has-error' : '' }}">
                            <label>Withdraw &#8358;:</label>
                            <input class="form-control" placeholder="Enter Ammount to Withdraw"  name="withdrawal" type="text" >

                            @if($errors->has('withdrawal'))
                                <span class="help-block">{{ $errors->first('withdrawal') }}</span>
                            @endif
                        </div>
                        
                        <div class="form-group{{ $errors->has('balance') ? ' has-error' : '' }}">
                            <label>Balance &#8358;:</label>
                            
                            <input class="form-control" readonly value="{{ $balance->balance }}"  name="balance" type="text" >
                            

                            @if($errors->has('balance'))
                                <span class="help-block">{{ $errors->first('balance') }}</span>
                            @endif
                        </div>
                        @endif

					</fieldset>
					<div>
						<div class="form-group">
							<button class="btn btn-primary" type="submit">Create Transaction</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
@stop

@section('footer')
	@include('admin.templates.footer')
@stop