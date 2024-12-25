
@extends('layouts.web') 
@section('content')
<section class="container my-5">
    <h2 class="text-center bg-danger text-white py-2">Coming Soon</h2>
    <div class="row justify-content-center">
        <div class="col-md-4 col-lg-3 mb-4">
            <a href="{{ url('/avatar') }}">
                <img src="{{ asset('images/1670915560-13-12-2022-1.jpg') }}" class="box img-fluid" alt="winne">
            </a>
        </div>
        <div class="col-md-4 col-lg-3 mb-4">
            <a href="https://example.com/megan">
                <img src="{{ asset('images/1671269851-17-12-2022-1.jpg') }}" class="box img-fluid" alt="megan">
            </a>
        </div>
        <div class="col-md-4 col-lg-3 mb-4">
            <a href="https://example.com/pakmov">
                <img src="{{ asset('images/HO00001658.jpg') }}" class="box img-fluid" alt="pakmov">
            </a>
        </div>
        <div class="col-md-4 col-lg-3 mb-4">
            <a href="https://example.com/ob">
                <img src="{{ asset('images/1672231007-28-12-2022-1.jpg') }}" class="box img-fluid" alt="ob">
            </a>
        </div>
        <div class="col-md-4 col-lg-3 mb-4">
            <a href="https://example.com/black-adam">
                <img src="{{ asset('images/1672219360-28-12-2022-1.jpg') }}" class="box img-fluid" alt="black adam">
            </a>
        </div>
        <div class="col-md-4 col-lg-3 mb-4">
            <a href="https://example.com/dragon">
                <img src="{{ asset('images/HO00001660.jpg') }}" class="box img-fluid" alt="dragon">
            </a>
        </div>
    </div>
</section>
@endsection


