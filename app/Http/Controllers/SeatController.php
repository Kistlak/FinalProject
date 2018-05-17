<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeatController extends Controller
{
    public function index()
    {
        return view('movies.showseats');
    }
}
