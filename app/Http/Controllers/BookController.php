<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seats;
use DB;
use Redirect;

class BookController extends Controller
{

//    public function index($showcode){
//
//        $seatsReserved = DB::table('seats')->where('st', $showcode)->pluck('item');
//        return view('Book')->with('seatsReserved',$seatsReserved);
//    }

    public function booktsinsert(Request $request)
    {

        $Mid = $request->input('Movieid');
        $date = $request->input('date');
        $st = $request->input('st');
//        $items = $request->input('items'); 
        $items = array();
        $items = $request->items;

        $query = DB::table('seats')
            ->where('Movie_id', '=', $Mid)
            ->where('date', '=', $date)
            ->where('st', '=', $st)
            ->where('item', '=', $items)
            ->count();

//        dd($query);

        if ($query > 0) {
            $request->session()->flash('Msg', 'You Cant Book This , Please Select Again !!');
            print_r($items);
            return \Redirect::back();
        } else {

            for ($i = 0; $i < count($items); $i++) {
                $user = new Seats();
                $user->Movie_id = $Mid;
                $user->date = $date;
                $user->st = $st;
//            $user->item = $items; 
                $user->item = $items[$i];

                $user->save();
            }
            $request->session()->flash('Msg', 'Inserted');
            return \Redirect::back();
        }

    }

    public function index()
    {
        return view('Master.BookNo');

    }

}
