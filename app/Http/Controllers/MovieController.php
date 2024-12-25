<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use App\Http\Middleware\ValidUser ; // Import the middleware
use App\Models\Category;

class MovieController extends Controller
{  public function index(Request $request)
    {
        // Dynamically apply the middleware
        $middleware = new \App\Http\Middleware\ValidUser();
        $middleware->handle($request, function () {});
    
        // Fetch movies if middleware passes
        $movies = Movie::all();
        return view('admin.index', compact('movies'));
    }
    
public function create()
{
    // Retrieve all categories
    $categories = Category::all();

    // Pass categories to the view
    return view('admin.create', compact('categories'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'image' => 'nullable|image|mimes:png,jpg|max:3000',
            'category' => 'required|string', // Validate the category as a string
        ]);
    
        if ($request->hasFile('image')) {
            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images'), $filename);
            $data['image'] = $filename;
        }
    
        // Store the movie with the category as a string
        Movie::create($data);
    
        return redirect()->route('movies.index');
    }
    

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $movie = Movie::findOrFail($id);

        return view('admin.show', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     */public function edit($id)
{
    $movie = Movie::findOrFail($id);
    $categories = Category::all(); // Fetch all categories
    return view('admin.edit', compact('movie', 'categories')); // Pass both movie and categories
}
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',  // Ensure category exists
            'image' => 'nullable|image|mimes:png,jpg,jpeg|max:3000',  // Allow jpg, png, and jpeg images
        ]);
       

        $movie = Movie::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($movie->image && file_exists(public_path('images/' . $movie->image))) {
                unlink(public_path('images/' . $movie->image));
            }

            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images'), $filename);
            $data['image'] = $filename;
        }

        $movie->update($data);

        return redirect()->route('movies.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);

        if ($movie->image && file_exists(public_path('images/' . $movie->image))) {
            unlink(public_path('images/' . $movie->image));
        }

        $movie->delete();

        return redirect()->route('movies.index');
    }

    /**
     * Display the now showing movies.
     */
    public function nowShowing()
    {
        $movies = Movie::all();
        return view('now-showing', compact('movies'));
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        
        $results = Movie::where('name', 'LIKE', "%{$query}%")
                        ->orWhere('category', 'LIKE', "%{$query}%")
                        ->get();
    
        return response()->json($results);
    }
    
}
