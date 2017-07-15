<div class="fh5co-narrow-content">
	<form action="{{ route('customer.login') }}" method="post">
		{{ csrf_field() }}
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<h1>Customer Login</h1> 
					<div class="col-md-6">
						<div class="form-group{{ $errors->has('username_or_email') ? ' has-error' : '' }}">
							<label for="username_email"></label>
							<input type="text" class="form-control" name="username_or_email" placeholder="Enter your Username or Email" value="">

							@if($errors->has('username_or_email'))
								<span class="help-block">{{ $errors->first('username_or_email') }}</span>
							@endif
						</div>
						<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
							<input type="password" class="form-control" name="password" placeholder="Password">

							@if($errors->has('password'))
								<span class="help-block">{{ $errors->first('password') }}</span>
							@endif
						</div>
						<div class="form-group">
	                        <div class="checkbox">
	                            <label>
	                                <input type="checkbox" name="remember" > Remember Me
	                            </label>
	                        </div>
		                </div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary">Login</button>
						</div>
					</div>
				</div>
			</div>			
		</div>
	</form>				
</div>