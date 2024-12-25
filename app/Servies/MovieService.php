<?php

namespace App\Services;

use App\Models\Movie;
use Illuminate\Support\Facades\Storage;

class MovieService
{
    public function getAllMovies()
    {
        return Movie::with('category')->get();
    }

    public function getMovieById($id)
    {
        return Movie::with('category')->find($id);
    }

    public function createMovie($data)
    {
        if (isset($data['image'])) {
            $data['image'] = $this->uploadImage($data['image']);
        }

        return Movie::create($data);
    }

    public function updateMovie($id, $data)
    {
        $movie = Movie::find($id);

        if (!$movie) {
            return null;
        }

        if (isset($data['image'])) {
            // Delete the old image if it exists
            if ($movie->image && file_exists(public_path('images/' . $movie->image))) {
                unlink(public_path('images/' . $movie->image));
            }

            $data['image'] = $this->uploadImage($data['image']);
        }

        $movie->update($data);

        return $movie;
    }

    public function deleteMovie($id)
    {
        $movie = Movie::find($id);

        if (!$movie) {
            return false;
        }

        if ($movie->image && file_exists(public_path('images/' . $movie->image))) {
            unlink(public_path('images/' . $movie->image));
        }

        $movie->delete();

        return true;
    }

    public function searchMovies($query)
    {
        return Movie::where('name', 'LIKE', "%{$query}%")
            ->orWhere('category', 'LIKE', "%{$query}%")
            ->get();
    }

    private function uploadImage($image)
    {
        $filename = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('images'), $filename);

        return $filename;
    }
}
