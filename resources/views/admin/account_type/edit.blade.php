@extends('admin.layouts.layout')

@section('content')
	<div class="col-md-6 col-md-offset-1">
		<div class="content-box-large">
			<div class="panel-heading">
            <div class="panel-title">Edit : {{ $account_type->name }}</div>

        </div>
			<div class="panel-body">
				<form action="{{ route('account_type.update', ['id' => $account_type->id]) }}" method="post">
					{{ csrf_field() }}
					<fieldset>
						<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
							<label>Account Type Name</label>
							<input class="form-control" value="{{ $account_type->name }}" placeholder="Customer Name" type="test" name="name">

							@if($errors->has('name'))
								<span class="help-block">{{ $errors->first('name') }}</span>
							@endif
						</div>
					</fieldset>
					<div>
						<div class="form-group">
							<button class="btn btn-primary" type="submit">Update Account Type</button>
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