<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seats;
use App\Booking;
use DB;
use Redirect;

class NewSeatController extends Controller
{

    public function booktsinsert(Request $request)
    {

        $Mid = $request->input('Movieid');
        $date = $request->input('date');
        $st = $request->input('st');

        dd($Mid, $date, $st);

                $user = new Seats();
                $user->Movie_id = $Mid;
                $user->date = $date;
                $user->st = $st;

                $user->save();

        return redirect('/newseat');

    }

    public function index()
    {
        $data = Seats::all();
        $bookingdata = Booking::all();
        $bookingdataarray =  array();
        foreach ($bookingdata as $k=>$bookingdatalist){
            $bookingdataarray[$k] = $bookingdatalist->seat_id;
        }

        return view('Master.NewSeat', compact('data','bookingdataarray'));
    }

}
