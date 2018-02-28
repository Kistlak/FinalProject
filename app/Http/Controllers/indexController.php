<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MoviePosters;

class indexController extends Controller
{
    public function index()
    {
      //return view('index');
        
      $data = MoviePosters::all();
      //$data = login::orderBy('created_at', 'desc')->get();
      return view('index', ['data' => $data]);
    }
}
