@extends('admin.layouts.layout')

@section('content')
	<div class="col-md-6 col-md-offset-1">
		<div class="content-box-large">
			<div class="panel-heading">
            <div class="panel-title">Update Account Information for {{ $customer->name }}</div>

        </div>
			<div class="panel-body">
				<form action="{{ route('customer_account.update', ['id' => $customer->id]) }}" method="post">
					{{ csrf_field() }}
					<fieldset>
						<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
							<label>Customer Name</label>
							<input class="form-control" value="{{ $customer->name }}" type="test" name="name">

							@if($errors->has('name'))
								<span class="help-block">{{ $errors->first('name') }}</span>
							@endif
						</div>
						<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
							<label>Customer Email</label>
							<input class="form-control" value="{{ $customer->email }}" type="email" name="email">

							@if($errors->has('email'))
								<span class="help-block">{{ $errors->first('email') }}</span>
							@endif
						</div>
						<div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
							<label>Customer Username</label>
							<input class="form-control" value="{{ $customer->username }}" type="text" name="username">

							@if($errors->has('username'))
								<span class="help-block">{{ $errors->first('username') }}</span>
							@endif
						</div>
						<div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
							<label>Customer Phone Number</label>
							<input class="form-control" value="{{ $customer->profile->phone_number }}" type="text" name="phone_number">

							@if($errors->has('phone_number'))
								<span class="help-block">{{ $errors->first('phone_number') }}</span>
							@endif
						</div>
						<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
							<label>Change Password</label>
							<input type="password" placeholder="Enter your new password" name="password" class="form-control">

							@if($errors->has('password'))
								<span class="help-block">{{ $errors->first('password') }}</span>
							@endif
						</div>
                        <div class="form-group{{ $errors->has('account_type_id') ? ' has-error' : '' }}">
                            <label>Account Type</label>
                            <select class="form-control" name="account_type_id" id="account_type_id">
                                @foreach($account_type as $account_types)
                                    <option value="{{ $account_types->id }}" 
									@if($account->account_type_id === $account_types->id)
										selected
									@endif
									>{{ $account_types->name }}</option>
                                @endforeach

                                @if($errors->has('account_type_id'))
                                    <span class="help-block">{{ $errors->first('account_type_id') }}</span>
                                @endif
                            </select>
                        </div>
                        <div class="form-group{{ $errors->has('account_number') ? ' has-error' : '' }}">
                            <label>Account Number</label>
                            <input class="form-control" value="{{ $account->account_number }}" placeholder="Enter Account Number" name="account_number" type="text" >

                            @if($errors->has('account_number'))
                                <span class="help-block">{{ $errors->first('account_number') }}</span>
                            @endif
                        </div>

						<div class="form-group{{ $errors->has('account_balance') ? ' has-error' : '' }}">
                            <label>Account Balance</label>
                            <input class="form-control" value="{{ $account->account_balance }}" placeholder="Enter Balance in digit" name="account_balance" type="text" >

                            @if($errors->has('account_balance'))
                                <span class="help-block">{{ $errors->first('account_balance') }}</span>
                            @endif
                        </div>

					</fieldset>
					<div>
						<div class="form-group">
							<button class="btn btn-primary" type="submit">Update Account</button>
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