
@extends('admin.layouts.layout')

@section('content')
	<div class="col-md-6 col-md-offset-1">
		<div class="content-box-large">
			<div class="panel-heading">
            <div class="panel-title">Site Settings</div>

        </div>
			<div class="panel-body">
				<form action="{{ route('settings.update') }}" method="post">
					{{ csrf_field() }}
					<fieldset>
						<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
							<label>Site Name</label>
							<input class="form-control" value="{{ $settings->site_title }}" type="text" name="name">

							@if($errors->has('name'))
								<span class="help-block">{{ $errors->first('name') }}</span>
							@endif
						</div>
						<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
							<label>Site Email</label>
							<input class="form-control" value="{{ $settings->site_email }}" type="email" name="email">

							@if($errors->has('email'))
								<span class="help-block">{{ $errors->first('email') }}</span>
							@endif
						</div>
                        <div class="form-group{{ $errors->has('site_contact') ? ' has-error' : '' }}">
                            <label>Site Contact</label>
                            <input class="form-control" value="{{ $settings->site_contact }}" name="site_contact" type="text" >

                            @if($errors->has('site_contact'))
                                <span class="help-block">{{ $errors->first('site_contact') }}</span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('site_address') ? ' has-error' : '' }}">
                            <label>Site Address</label>
                            <textarea name="site_address" class="form-control" cols="6" rows="6">{{ $settings->site_address }}</textarea>

                            @if($errors->has('site_address'))
                                <span class="help-block">{{ $errors->first('site_address') }}</span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('site_facebook') ? ' has-error' : '' }}">
                            <label>Site Facebook Address</label>
                            <input class="form-control" value="{{ $settings->site_facebook }}" name="site_facebook" type="text" >

                            @if($errors->has('site_facebook'))
                                <span class="help-block">{{ $errors->first('site_facebook') }}</span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('site_twitter') ? ' has-error' : '' }}">
                            <label>Site Twitter Address</label>
                            <input class="form-control" value="{{ $settings->site_twitter }}" name="site_twitter" type="text" >

                            @if($errors->has('site_twitter'))
                                <span class="help-block">{{ $errors->first('site_twitter') }}</span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('site_linkedIn') ? ' has-error' : '' }}">
                            <label>Site LinkedIn Address</label>
                            <input class="form-control" value="{{ $settings->site_linkdn }}" name="site_linkedIn" type="text" >

                            @if($errors->has('site_linkedIn'))
                                <span class="help-block">{{ $errors->first('site_linkedIn') }}</span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('about') ? ' has-error' : '' }}">
                            <label>About Site</label>
                            <textarea name="about" class="form-control" cols="6" rows="6">{{ $settings->about }}</textarea>

                            @if($errors->has('about'))
                                <span class="help-block">{{ $errors->first('about') }}</span>
                            @endif
                        </div>
					</fieldset>
					<div>
						<div class="form-group">
							<button class="btn btn-primary" type="submit">Update Site</button>
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