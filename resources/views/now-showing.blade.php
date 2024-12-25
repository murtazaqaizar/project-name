@extends('layouts.web') 
@section('content')
<section class="container my-5">
    <h2 class="text-center bg-danger text-white py-2">Now Showing</h2>
    <div class="row justify-content-center">
        <!-- Individual movie cards -->
        <div class="col-md-4 col-lg-3 mb-4">
            <a href="{{ url('/avatar') }}">
                <div class="d-flex flex-column align-items-start" style="height: 100%;">
                    <img src="{{ asset('images/HO00001401.jpg') }}" class="box img-fluid" alt="maula">
                    <div class="mt-2" style="flex: 1; text-align: left; padding: 5px;">
                        <h5 style="font-size: 1.2rem; margin: 0; color: rgb(240, 29, 29);">Maula</h5>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 col-lg-3 mb-4">
            <a href="{{ url('/avatar') }}">
                <div class="d-flex flex-column align-items-start" style="height: 100%;">
                    <img src="{{ asset('images/HO00001633.jpg') }}" class="box img-fluid" alt="avatar">
                    <div class="mt-2" style="flex: 1; text-align: left; padding: 5px;">
                        <h5 style="font-size: 1.2rem; margin: 0; color: rgb(240, 29, 29);">Avatar</h5>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 col-lg-3 mb-4">
            <a href="{{ url('/avatar') }}">
                <div class="d-flex flex-column align-items-start" style="height: 100%;">
                    <img src="{{ asset('images/HO00001628.jpg') }}" class="box img-fluid" alt="black panther">
                    <div class="mt-2" style="flex: 1; text-align: left; padding: 5px;">
                        <h5 style="font-size: 1.2rem; margin: 0; color: rgb(240, 29, 29);">Black Panther</h5>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 col-lg-3 mb-4">
            <a href="{{ url('/avatar') }}">
                <div class="d-flex flex-column align-items-start" style="height: 100%;">
                    <img src="{{ asset('images/ob3.jpg') }}" class="box img-fluid" alt="ob">
                    <div class="mt-2" style="flex: 1; text-align: left; padding: 5px;">
                        <h5 style="font-size: 1.2rem; margin: 0; color: rgb(240, 29, 29);">OB</h5>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 col-lg-3 mb-4">
            <a href="{{ url('/avatar') }}">
                <div class="d-flex flex-column align-items-start" style="height: 100%;">
                    <img src="{{ asset('images/HO00001585.jpg') }}" class="box img-fluid" alt="black adam">
                    <div class="mt-2" style="flex: 1; text-align: left; padding: 5px;">
                        <h5 style="font-size: 1.2rem; margin: 0; color: rgb(240, 29, 29);">Black Adam</h5>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 col-lg-3 mb-4">
            <a href="{{ url('/avatar') }}">
                <div class="d-flex flex-column align-items-start" style="height: 100%;">
                    <img src="{{ asset('images/dragono.jfif') }}" class="box img-fluid" alt="dragon">
                    <div class="mt-2" style="flex: 1; text-align: left; padding: 5px;">
                        <h5 style="font-size: 1.2rem; margin: 0; color: rgb(240, 29, 29);">Dragon</h5>
                    </div>
                </div>
            </a>
        </div>
        @foreach($movies as $movie)
        <div class="col-md-4 col-lg-3 mb-4">
            <a href="{{ url('/avatar') }}">
                <div class="d-flex flex-column align-items-start" style="height: 100%;">
                    <img src="{{ asset('images/' . $movie->image) }}" class="box img-fluid" alt="{{ $movie->name }}">
                    <div class="mt-2" style="flex: 1; text-align: left; padding: 5px;">
                        <h5 style="font-size: 1.2rem; margin: 0; color: rgb(240, 29, 29);">{{ $movie->name }}</h5>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</section>
@endsection
