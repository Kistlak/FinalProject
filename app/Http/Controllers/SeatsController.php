<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeatsController extends Controller
{
    
    public function index()
    {
       return view('Seats'); 
    }
    
}
