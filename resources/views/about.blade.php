@extends('customer.layouts.layout')

@section('content')

    <div class="fh5co-narrow-content">
        <div class="row row-bottom-padded-md">
            <div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
                <img class="img-responsive img-rounded" src="images/about.jpg" alt="Free HTML5 Bootstrap Template by FreeHTML5.co">
            </div>
            <div class="col-md-6 animate-box" data-animate-effect="fadeInLeft">
                <h2 class="fh5co-heading">About Company</h2>
                <p>{{ $settings->about }}</p>
            </div>
        </div>
    </div>
    
@stop