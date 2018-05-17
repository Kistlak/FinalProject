<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BookSeat;
use DB;
use Redirect;
use App\Mail\MyMail;

class BookSeatController extends Controller
{

    public function booktsinsert(Request $request)
    {

        $Mid = $request->input('Movieid');
        $date = $request->input('date');
        $st = $request->input('st');
        $sendemail = $request->input('email');
//        $items = $request->input('items');
        $items = array();
        $items = $request->items;

        $query = DB::table('book')
            ->where('Movie_id', '=', $Mid)
            ->where('sdate', '=', $date)
            ->where('stime', '=', $st)
            ->where('seatno', '=', $items)
            ->count();

//        dd($query);

        if ($query > 0) {
            $request->session()->flash('Msg', 'You Cant Book This , Please Select Again !!');
            print_r($items);
            return \Redirect::back();
        } else {

            for ($i = 0; $i < count($items); $i++) {
                $user = new BookSeat();
                $user->Movie_id = $Mid;
                $user->sdate = $date;
                $user->stime = $st;
                $user->email = $sendemail;
//            $user->item = $items;
                $user->seatno = $items[$i];

                $user->save();

              //  \Mail::to($user)->send(new MyMail);
            }

            $request->session()->flash('Msg', 'Inserted');
            //return \Redirect::back();
            return redirect('paywithpaypal');
        }

    }

    public function index()
    {
        return view('Master.BookNo');
    }

    public function bookconfirmation()
    {
        return view('Master.BookConfirm');
    }

}
