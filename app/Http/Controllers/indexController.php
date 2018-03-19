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
