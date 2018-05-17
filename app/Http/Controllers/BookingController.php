<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShowBookingRequest;
use App\Movie;
use App\Seats;
use App\Show;

class BookingController extends Controller
{
    public function show(Movie $movie, ShowBookingRequest $request)
    {
        $show = Show::with('bookings.seat')->where('movie_id', $movie->id)
            ->where('date', $request->get('date'))
            ->where('time', $request->get('time') . ':00')
            ->get();

        if ($show->isEmpty()) {
            abort(404);
        }

        $show = $show->first();

        $show->bookings;
        $seats = Seats::all();

        dd($show->toArray(), $seats->toArray());
    }

    public function store()
    {

    }
}
