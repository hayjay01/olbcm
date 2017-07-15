
@extends('admin.layouts.layout')

@section('content')
	<div class="col-md-6 col-md-offset-1">
		<div class="content-box-large">
			<div class="panel-heading">
            <div class="panel-title">Admin Profile</div>

        </div>
			<div class="panel-body">
				<form action="{{ route('profile.update') }}" method="post">
					{{ csrf_field() }}
					<fieldset>
						<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
							<label>Admin Name</label>
							<input class="form-control" value="{{ $admin->name }}" type="test" name="name">

							@if($errors->has('name'))
								<span class="help-block">{{ $errors->first('name') }}</span>
							@endif
						</div>
						<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
							<label>Admin Email</label>
							<input class="form-control" value="{{ $admin->email }}" type="email" name="email">

							@if($errors->has('email'))
								<span class="help-block">{{ $errors->first('email') }}</span>
							@endif
						</div>
                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
							<label>Admin Username</label>
							<input class="form-control" value="{{ $admin->username }}" type="text" name="username">

							@if($errors->has('username'))
								<span class="help-block">{{ $errors->first('username') }}</span>
							@endif
						</div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
							<label>Change Admin Password</label>
							<input class="form-control" type="password" name="password">

							@if($errors->has('password'))
								<span class="help-block">{{ $errors->first('password') }}</span>
							@endif
						</div>
                        <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                            <label>Admin Phone Number</label>
                            <input class="form-control" value="{{ $profile->phone_number }}" name="phone_number" type="text" >

                            @if($errors->has('phone_number'))
                                <span class="help-block">{{ $errors->first('phone_number') }}</span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label>Admin Address</label>
                            <textarea name="address" class="form-control" cols="6" rows="6">{{ $profile->address }}</textarea>

                            @if($errors->has('address'))
                                <span class="help-block">{{ $errors->first('address') }}</span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('sex') ? ' has-error' : '' }}">
                            <label class="radio-inline">
                                <input type="radio" value="Male" name="sex"
                                @if($profile->sex === 'Male')
                                    checked
                                @endif
                                >Male
                            </label>

                            <label class="radio-inline">
                                <input type="radio" value="Female" name="sex"
                                @if($profile->sex === 'Female')
                                    checked
                                @endif
                                >Female
                            </label>

                            @if($errors->has('sex'))
                                <span class="help-block">{{ $errors->first('sex') }}</span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
                            <label>Date of Birth</label>
                            <input class="form-control" value="{{ $profile->dob }}" name="dob" type="date" >

                            @if($errors->has('dob'))
                                <span class="help-block">{{ $errors->first('dob') }}</span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                            <label for="state">State</label>
                            <select name="state" class="form-control">
                                @foreach($states as $state)
                                    <option value="{{ $state }}"
                                    @if($profile->state === $state)
                                        selected
                                    @endif
                                    >{{ $state }}</option>
                                @endforeach

                                @if($errors->has('state'))
                                    <span class="help-block">{{ $errors->first('state') }}</span>
                                @endif
                            </select>
                        </div>
                        <div class="form-group{{ $errors->has('nationality') ? ' has-error' : '' }}">
                            <label for="Nationality">Nationality</label>
                            <select name="nationality" class="form-control">
                                @foreach($countries as $country)
                                    <option value="{{ $country }}"
                                    @if($profile->nationality === $country)
                                        selected
                                    @endif
                                    >{{ $country }}</option>
                                @endforeach
                                @if($errors->has('nationality'))
                                    <span class="help-block">{{ $errors->first('nationality') }}</span>
                                @endif
                            </select>
                        </div>
					</fieldset>
					<div>
						<div class="form-group">
							<button class="btn btn-primary" type="submit">Update Profile</button>
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