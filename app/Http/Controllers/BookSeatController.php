<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BookSeat;
use DB;
use Redirect;
use App\Mail\MyMail;
use Mail;

class BookSeatController extends Controller
{

    public function booktsinsert(Request $request)
    {

        $Mid = $request->input('Movieid');
        $Mname = $request->input('Moviename');
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

            }

            $request->session()->flash('Msg', 'Inserted');
            //return \Redirect::back();

            $data = [];
            $data['Mname'] = $Mname;
            $data['date'] = $date;
            $data['st'] = $st;
            $data['sendemail'] = $sendemail;

            Mail::send(['text' => 'mail'], $data, function ($message) use ($data) {
                $message->to($data["sendemail"], 'TicketBooker')->subject
                ('Amazing Cinema Ticket');
                $message->from('kistlakall@gmail.com', 'Amazing Cinema');
            });
            //echo "Basic Email Sent. Check your inbox.";

            return view('addmoney.paywithpaypal', ['data' => $data]);

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

    public function ticinfo(Request $request)
    {

        $Mid = $request->input('Movieid');
        $date = $request->input('date');
        $st = $request->input('st');
        $sendemail = $request->input('email');
//        $items = $request->input('items');
        //$items = array();
        // $items = $request->items;

        // return view('paywithpaypal', compact('Mid','date', 'st', 'sendemail', 'items'));

        // $first = 'Kist';
        // $last = 'raja';

        // $fulname = $first . " " . $last;
        // $email = 'kist@gmail.com';

        $data = [];
        $data['Mid'] = $Mid;
        $data['date'] = $date;
        $data['st'] = $st;
        $data['sendemail'] = $sendemail;
        return view('addmoney.paywithpaypal')->withData($data);

    }

}
