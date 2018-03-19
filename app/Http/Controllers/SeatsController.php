<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seats;
use DB;

class SeatsController extends Controller
{
    
    public function index()
    {
       return view('Master.Seats'); 
    }
    
    public function seatsinsert(Request $request)
    {

        $Mid = $request->input('Movieid');
        $date = $request->input('date');
        $st = $request->input('st');
        $item = $request->input('items'); 
        $items = str_replace(['[', ']', '"'], '', $item); 

        $query = DB::table('seats')
        ->where('Movie_id', '=', $Mid)        
        ->where('date', '=', $date)
        ->where('st', '=', $st)
        ->where('item', '=', $items)        
        ->count();
        
        dd($query);
        
        if($query > 0 ) { 
	$request->session()->flash('Msg', 'No Seat');
        return redirect('Seats');
	}
        else{
        $user = new Seats();
        $user->Movie_id = $Mid; 
        $user->date = $date; 
        $user->st = $st; 
        $user->item = $items; 

        $user->save();
        }
        
    }  
    
    public function seatprocess(Request $request)
    {
        //dd($request->all());
        //$results = DB::table('seats')->where(['date' => $date, 'st' => $st, 'item' => $items])->get();
        //echo 'Date: ' . $date . '$st: ' . $st . 'items: ' . $items;
        //$results = DB::table('seats')->where('item',$items)->get();
         //$date='2018-03-09';
         //$st = '10.30 am';
         //$items = '1';
        $date = $request->input('date');
        $st = $request->input('st');
        $items = $request->input('items');     

        $results = DB::table('seats')->where(['date' => $date, 'st' => $st, 'item' => $items])->get();
        
        echo $results;

        
    }
    
}
