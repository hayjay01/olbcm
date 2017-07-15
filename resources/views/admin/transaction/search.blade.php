
@extends('admin.layouts.layout')

@section('content')
	<div class="col-md-6 col-md-offset-1">
		<div class="content-box-large">
			<div class="panel-heading">
            <div class="panel-title">Search for Customer</div>

        </div>
			<div class="panel-body">
				<form action="{{ route('search.result') }}" method="get">
					<fieldset>
						<div class="form-group{{ $errors->has('search') ? ' has-error' : '' }}">
							<label></label>
							<input class="form-control" placeholder="Enter Account Number" type="text" name="search">

							@if($errors->has('search'))
								<span class="help-block">{{ $errors->first('search') }}</span>
							@endif
						</div>
					</fieldset>
					<div>
						<div class="form-group">
							<button class="btn btn-primary" type="submit">Search</button>
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