@extends('layouts.web')
@section('content')


<section id="posters_section" class="container my-5">
    <div class="slider text-center">
       
        <div class="maindiv mx-auto"></div>
    </div>
</section>

<section id="location_section" class="my-5">
    <div class="bg-danger text-white py-2">
        <h2 class="text-center container">Locations</h2>
    </div>
    <div class="container">
        <div class="d-flex justify-content-around my-3">
            <span class="la text-danger fs-4">DHA</span>
            <span class="la text-danger fs-4">Askari</span>
            <span class="la text-danger fs-4">Saddar</span>
        </div>
        <div class="text-center">
            <a href="https://www.google.com/search?q=cinemas+in+karachi" target="_blank">
                <img src="{{ asset('images/map.png') }}" alt="Map" class="img-fluid">
            </a>
        </div>
    </div>
</section>

<section id="contact_sections" class="my-5">
    <div class="bg-danger text-white py-2">
        <h2 class="text-center">Contact Us</h2>
    </div>
    <div class="container">
        <div class="details bg-dark text-white p-4">
            <ul id="d1" class="list-unstyled">
                <li class="fs-5">DHA</li>
                <li>Cinepax Ocean Mall, 4th Floor</li>
                <li>II Talwar, Karachi - Pakistan</li>
                <li>UAN: (042) 111-CINEPAX (246 372)</li>
                <li>Local call charges apply</li>
                <li>Email: contact@cinepax.com</li>
            </ul>
        </div>
    </div>
</section>

@endsection
