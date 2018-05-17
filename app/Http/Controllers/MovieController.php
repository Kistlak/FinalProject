<?php

namespace App\Http\Controllers;

use App\Movie;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::paginate(10);

        return view('movies.index', compact('movies'));
    }

    public function show(Movie $movie)
    {
        $movie->load(['shows']);

        $showTimes = $movie->shows->groupBy(['date_str'])->first()->map(function ($show) {
            return $show->time;
        });

        return view('movies.show', compact( 'movie', 'showTimes'));
    }
}
