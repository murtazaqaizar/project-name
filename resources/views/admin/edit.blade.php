@extends('layouts.master-layout')

@section('content')
<div class="container">
    <h1>Edit Movie</h1>

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

    <form action="{{ route('movies.update', $movie->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Movie Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $movie->name) }}" required>
        </div>

        <div class="form-group">
            <label for="image">Movie Image</label>
            <input type="file" name="image" id="image" class="form-control">
            @if ($movie->image)  {{-- Display current image if it exists --}}
                <div class="mt-2">
                <img src="{{ asset('images/' . $movie->image) }}" class="box img-fluid" alt="{{ $movie->name }}">
                </div>
            @endif
        </div>

        <div class="form-group">
            <label for="category_id">Category</label>
            <select name="category_id" id="category_id" class="form-control" required>
                <option value="">Select Category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $movie->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success mt-3">Update Movie</button>
    </form>
</div>
@endsection
