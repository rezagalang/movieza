<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class MainController extends Controller
{
    public function dashboard()
    {
        $movies = Movie::paginate(4);
        $users = User::where('id', auth()->user()->id)->get();
        return view('pages.back.dashboard', compact('movies', 'users'));
        
    }

    public function dashboardAll()
    {
        $movies = Movie::latest()->get();
        $users = User::where('id', auth()->user()->id)->get();
        return view('pages.back.dashboard', compact('movies', 'users'));
        // $movies = Crypt::decryptString('$2y$10$pMfdArvJQE6S9GhIKtVmHOdJgzgSzT/hrdZzjVLNH.fT8Kf4HG/qq');
        // echo $movies;

        // $encrypted = Crypt::encryptString('admin123');
		// $decrypted = Crypt::decryptString($encrypted);
		// echo $encrypted . '<br>';
		// echo $decrypted;
    }

    public function frontAll()
    {
        $movies = Movie::latest()->get();
        if(Auth::guest()) {
            $users = User::all();
        } else {
            $users = User::where('id', auth()->user()->id)->get();
        }
        return view('pages.front.all', compact('movies', 'users'));
    }

    public function showDetail(Movie $movie)
    {
        if(Auth::guest()) {
            $users = User::all();
        } else {
            $users = User::where('id', auth()->user()->id)->get();
        }
        return view('pages.front.detail', compact('movie', 'users'));
    }
}
