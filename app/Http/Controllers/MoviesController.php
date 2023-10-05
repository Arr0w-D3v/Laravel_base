<?php

namespace App\Http\Controllers;

use Str;
use App\Models\Actor;
use App\Models\Movie;
use App\Models\Category;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::with('category', 'actors')->get();

       // dd($movies);

        $title = 'Liste des films';

        return view('movies.index', compact('title', 'movies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Ajouter un film';

        $categories = Category::where('is_active', true)->get();
        $actors = Actor::all();

        return view('movies.create', compact('title', 'categories', 'actors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //dd($request->all());
        $input = $request->all();
        $input['slug'] = Str::slug($request->title);

        $movie = Movie::create($input);

        $movie->actors()->attach($request->actors);

        return redirect()->route('movies.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        $title = 'Modifier un film';
        $categories = Category::where('is_active', true)->get();
        $actors = Actor::all();

        return view('movies.edit', compact('title', 'categories', 'actors', 'movie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movie $movie)
    {
        $input = $request->all();
        $input['slug'] = Str::slug($request->title);

        $movie->update($input);

        $movie->actors()->sync($request->actors);

        return redirect()->route('movies.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        $movie->actors()->detach();

        $movie->delete();



        return redirect()->route('movies.index');
    }
}
