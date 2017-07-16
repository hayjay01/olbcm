{{--  @extends('customer.layouts.layout')

@section('content')

	@include('customer.templates.slide')

	@include('customer.templates.services')

	@include('customer.templates.login') 

@stop  --}}

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="App with Laravel" />
	<meta name="keywords" content="Laravel" />
	<meta name="RHEEDtech" content="" />

  	<!-- 
	//////////////////////////////////////////////////////

	FREE HTML5 TEMPLATE 
	DESIGNED & DEVELOPED by FreeHTML5.co
		
	Website: 		http://freehtml5.co/
	Email: 			info@freehtml5.co
	Twitter: 		http://twitter.com/fh5co
	Facebook: 		https://www.facebook.com/fh5co

	//////////////////////////////////////////////////////
	-->

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="{{ asset('css/animate.css') }}">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="{{ asset('css/icomoon.css') }}">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
	<!-- Flexslider  -->
	<link rel="stylesheet" href="{{ asset('css/flexslider.css') }}">
	<!-- Theme style  -->
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">

	<link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">

	@yield('style')

	<!-- Modernizr JS -->
	<script src="{{ asset('js/modernizr-2.6.2.min.js') }}"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
	<style>
		body{
			background-color:white;
		}

		.pd-10{
			margin-top:70px;
		}
	</style>
    <div class="container">
        <div class="row">
			<center class="pd-10"> <h3> WELCOME TO OLIVE COMMUNITY BANK</h3></center>			
            <div class="col-md-4">

			</div>

            <div class="col-md-4">
            <p></br></p>
            <p></br></p>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="glyphicon glypicon-pencil"> </span> <b> Customer's Login </b> 
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route('customer.login') }}">
					{{ csrf_field() }}
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username_or_email" placeholder="Enter your username" class="form-control">
                        
						@if($errors->has('username_or_email'))
								<span class="help-block">{{ $errors->first('username_or_email') }}</span>
						@endif
						</div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" placeholder="Enter your password" class="form-control">
                        
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
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-success" >Login</button>
                        </div>
                    </form>
                </div>
            </div> 
            </div>

            <div class="col-md-4"></div>
        </div>
    </div>


	<!-- jQuery -->
	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<!-- jQuery Easing -->
	<script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
	<!-- Bootstrap -->
	<script src="{{ asset('js/bootstrap.min.js') }}"></script>
	<!-- Waypoints -->
	<script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
	<!-- Flexslider -->
	<script src="{{ asset('js/jquery.flexslider-min.js') }}"></script>

	@yield('script')
	
	
	<!-- MAIN JS -->
	<script src="{{ asset('js/main.js') }}"></script>

	<script src="{{ asset('js/toastr.min.js') }}"></script>
    <script>
        @if(Session::has('success'))
            toastr.success("{{ Session::get('success') }}")
        @endif

        @if(Session::has('info'))
            toastr.info("{{ Session::get('info') }}")
        @endif

        @if(Session::has('error'))
            toastr.error("{{ Session::get('error') }}")
        @endif
    </script>

	</body>
</html>

