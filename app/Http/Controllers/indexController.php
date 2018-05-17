<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MoviePosters;
use App\Movie;
use App\Show;

class indexController extends Controller // MoviesController
{
    public function index()
    {
        $movies = Movie::all(); // Movie::nowShowing()->paginate(10);

        return view('Master.index', compact('movies'));
    }

    public function editSeats(MoviePosters $edd)
    {
        return view('Master.Seats', compact('edd'));
    }

    public function editBooks(MoviePosters $bk)
    {
        return view('Master.Book', compact('bk'));
    }
}
