<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MoviePosters;
use DB;
use Redirect;

class SearchMoviesController extends Controller
{
    public function index()
    {
        return view('Master.SearchMovies');
    }

    public function msearch(Request $request)
    {
        $fdate = $request->input('fdate');
        $sdate = $request->input('sdate');

        $query = DB::table('movies')
            ->whereBetween('created_at', array($fdate, $sdate))
            ->count();

//        dd($query);

        if ($query == 0) {
            $request->session()->flash('Msg', 'There are no movies between these days');
            return \Redirect::back();
        } else {
            $request->session()->flash('Msg', $query);
            return \Redirect::back();
        }
    }
}
