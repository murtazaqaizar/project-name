@extends('layouts.master-layout') 
@section('content')
<div class="container">
    <h1>Movie Details</h1>
    <div class="card">
        <div class="card-header">
            {{ $movie->name }}
        </div>
        <div class="card-body">
            @if ($movie->image)
            <img src="{{ asset('images/' . $movie->image) }}" class="box img-fluid" alt="{{ $movie->name }}">
            @else
                <p>No Image Available</p>
            @endif
            <p><strong>Name:</strong> {{ $movie->name }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('movies.index') }}" class="btn btn-primary">Back to List</a>
        </div>
    </div>
</div>

@endsection
