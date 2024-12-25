<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\MovieService;

class MovieApiController extends Controller
{
    protected $movieService;

    public function __construct(MovieService $movieService)
    {
        $this->movieService = $movieService;
    }

    public function index()
    {
        return response()->json($this->movieService->getAllMovies());
    }

    public function show($id)
    {
        $movie = $this->movieService->getMovieById($id);

        if (!$movie) {
            return response()->json(['message' => 'Movie not found'], 404);
        }

        return response()->json($movie);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:png,jpg,jpeg|max:3000',
        ]);

        $movie = $this->movieService->createMovie($validatedData);

        return response()->json($movie, 201);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:png,jpg,jpeg|max:3000',
        ]);

        $movie = $this->movieService->updateMovie($id, $validatedData);

        if (!$movie) {
            return response()->json(['message' => 'Movie not found'], 404);
        }

        return response()->json($movie);
    }

    public function destroy($id)
    {
        $deleted = $this->movieService->deleteMovie($id);

        if (!$deleted) {
            return response()->json(['message' => 'Movie not found'], 404);
        }

        return response()->json(['message' => 'Movie deleted successfully']);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $results = $this->movieService->searchMovies($query);

        return response()->json($results);
    }
}
