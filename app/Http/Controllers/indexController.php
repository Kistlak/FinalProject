<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MoviePosters;

class indexController extends Controller // MoviesController
{
    public function index()
    {
        // nowShowing : eloquent scope functions
        $data = MoviePosters::all(); // Movie::nowShowing()->paginate(10);

        // - title
        // - cover photo path
        // - description
        // - status (boolean) true = showing / false = closed

        // return view('movies.list', compact('movies'));

        return view('Master.index', compact('data'));
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
