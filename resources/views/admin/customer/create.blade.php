@extends('admin.layouts.layout')

@section('content')
	<div class="col-md-6 col-md-offset-1">
		<div class="content-box-large">
			<div class="panel-heading">
            <div class="panel-title">Add Customer</div>

        </div>
			<div class="panel-body">
				<form action="{{ route('user.store') }}" method="post">
					{{ csrf_field() }}
					<fieldset>
						<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
							<label>Customer Name</label>
							<input class="form-control" placeholder="Customer Name" type="test" name="name">

							@if($errors->has('name'))
								<span class="help-block">{{ $errors->first('name') }}</span>
							@endif
						</div>
						<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
							<label>Customer Email</label>
							<input class="form-control" placeholder="Email Address" type="email" name="email">

							@if($errors->has('email'))
								<span class="help-block">{{ $errors->first('email') }}</span>
							@endif
						</div>
						<div class="form-group{{ $errors->has('account_type_id') ? ' has-error' : '' }}">
                            <label>Account Type</label>
                            <select class="form-control" name="account_type_id">
                                <option value="">Select Account Type</option>
                                @foreach($account_type as $account_types)
                                    <option value="{{ $account_types->id }}">{{ $account_types->name }}</option>
                                @endforeach

                                @if($errors->has('account_type_id'))
                                    <span class="help-block">{{ $errors->first('account_type_id') }}</span>
                                @endif
                            </select>
                        </div>
                        <div class="form-group{{ $errors->has('account_number') ? ' has-error' : '' }}">
                            <label>Account Number</label>
                            <input class="form-control" value="" placeholder="Enter Account Number" name="account_number" type="text" >

                            @if($errors->has('account_number'))
                                <span class="help-block">{{ $errors->first('account_number') }}</span>
                            @endif
                        </div>
					</fieldset>
					<div>
						<div class="form-group">
							<button class="btn btn-primary" type="submit">Add User</button>
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