<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::latest()->get();
        $users = User::where('id', auth()->user()->id)->get();
        return view('pages.back.movies', compact('movies', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.back.create', ['users' => User::where('id', auth()->user()->id)->get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataMovie = $request->validate([
            'title' => 'required|max:100',
            'year' => 'required',
            'description' => 'required',
            'image' => 'required|image|file|max:1024',
        ]);

        if($request->file('image')) {
            $dataMovie['image'] = $request->file('image')->store('movies-image');
        }

        $last_id = Movie::create($dataMovie);
        $genre = $request->genre;

        for($i = 0; $i < count($genre); $i++) {
            $dataGenre = new Genre();
            $dataGenre->movie_id = $last_id->id;
            $dataGenre->genre = $genre[$i];
            $dataGenre->save();
        }
        
        return redirect('movies')->with('toast_success', 'Data added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        $users = User::where('id', auth()->user()->id)->get();
        return view('pages.back.detail', compact('movie', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        $users = User::where('id', auth()->user()->id)->get();
        return view('pages.back.edit', compact('movie', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        $dataMovie = $request->validate([
            'title' => 'required|max:100',
            'year' => 'required',
            'description' => 'required',
            'image' => 'image|file|max:1024',
        ]);

        if($request->file('image')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $dataMovie['image'] = $request->file('image')->store('movies-image');
        }

        Movie::where('id', $movie->id)->update($dataMovie);

        Genre::where('movie_id', $movie->id)->delete();

        $genre = $request->genre;
        for($i = 0; $i < count($genre); $i++) {
            $dataGenre = new Genre();
            $dataGenre->movie_id = $movie->id;
            $dataGenre->genre = $genre[$i];
            $dataGenre->save();
        }

        return redirect('movies')->with('toast_success', 'Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Genre::where('movie_id', $id)->delete();
        $data = Movie::find($id);
        $data->delete();

        return redirect('movies')->with('toast_success', 'Data deleted successfully');
    }
}
