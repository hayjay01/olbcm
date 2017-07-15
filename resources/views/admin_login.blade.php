<!DOCTYPE html>
<html>
  <head>
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="{{ asset('bootstrap_admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- styles -->
    <link href="{{ asset('css_admin/styles.css') }}" rel="stylesheet">
    <!-- toastr -->
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-bg">
  	<div class="header">
	     <div class="container">
	        <div class="row">
	           <div class="col-md-12">
	              <!-- Logo -->
	              <div class="logo">
	                 <h1><a href="{{ route('admin_login') }}">Admin Area</a></h1>
	              </div>
	           </div>
	        </div>
	     </div>
	</div>

	<div class="page-content container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="login-wrapper">
			        <div class="box">
			        	<form action="{{ route('admin.login') }}" method="POST">
			        		{{ csrf_field() }}
				            <div class="content-wrap">
				                <h6>Admin Sign In</h6>
				                <div class="social">
		                            <a class="face_login" href="#">
		                                <span class="face_icon">
		                                    <img src="{{ asset('images_admin/facebook.png') }}" alt="fb">
		                                </span>
		                                <span class="text">Sign in with Facebook</span>
		                            </a>
		                            <div class="division">
		                                <hr class="left">
		                                <span>or</span>
		                                <hr class="right">
		                            </div>
		                        </div>
		                        <div class="form-group{{ $errors->has('Username_or_email') ? ' has-error' : '' }}">
				                	<input class="form-control" name="Username_or_email" type="text" placeholder="Username or E-mail address">
				                	@if($errors->has('Username_or_email'))
										<span class="help-block">{{ $errors->first('Username_or_email') }}</span>
									@endif
				                </div>
				                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
				                	<input class="form-control" name="password" type="password" placeholder="Password">
				                	@if($errors->has('password'))
										<span class="help-block">{{ $errors->first('password') }}</span>
									@endif
				                </div>
				                <div class="form-group">
									<label>
										<input type="checkbox" name="remember"> Remember me
									</label>
								</div>
				                <div class="action">
				                    <button type="submit" class="btn btn-primary">Login</button>
				                </div>                
				            </div>
			            </form>
			        </div>
			    </div>
			</div>
		</div>
	</div>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('bootstrap_admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js_admin/custom.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    @include('toastr.toastr')
  </body>
</html>