<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seats;
use Auth;

class SeatsController extends Controller
{
    
    public function index()
    {
       return view('Seats'); 
    }
    
    public function seatsinsert(Request $request)
    {

        $date = $request->input('date');
        $st = $request->input('st');
        $items = $request->input('items'); 
        $items = str_replace(['[', ']', '"'], '', $items); 

        $user = new Seats(); 
        $user->date = $date; 
        $user->st = $st; 
        $user->item = $items; 

        $user->save();
  
    }  
    
    public function seatprocess(Request $request)
    {
        //dd($request->all());

        if(Seats::attempt([
        'date' => $request->date,
        'item' => $request->item
        ]))
      
        {
        $seat = Seats::where('item', $request->item)->first();

        return redirect('/AdminPanel');
        }
        else
        {
        return redirect('/Seats');
        }
    }
    
}
