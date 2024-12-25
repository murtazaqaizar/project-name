@extends('layouts.master-layout')

@section('content')
<div class="container">
    <h1>Movies List</h1>

    <a href="{{ route('movies.create') }}" class="btn btn-primary mb-3">Add New Movie</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($movies as $movie)
                <tr>
                    <td>{{ $movie->id }}</td>
                    <td>{{ $movie->name }}</td>
                    <td>
                        <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
