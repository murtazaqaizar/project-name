@extends('layouts.master-layout')

@section('content')
<div class="container">
    <h1>Add New Movie</h1>

    {{-- Show validation errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Movie creation form --}}
    <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Movie Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Movie Image</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>

        <div class="mb-3">
    <label for="category" class="form-label">Category</label>
    <input type="text" name="category" id="category" class="form-control" placeholder="Enter category" required>
</div>


        <button type="submit" class="btn btn-primary">Save Movie</button>
    </form>
</div>
@endsection
