<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Input;
use DB;

class CustomizeWebController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('AdminPanel.CustomizeWeb');

        //$data = MoviePosters::all();
        //return view('CustomizeWeb', ['data' => $data]);
    }

    public function logoshow()
    {
        $users = DB::select('select * from logo where id = ?', ['1']);
        return view('Logo', ['users' => $users]);

    }

    public function logoupdate(Request $request)
    {

        if (Input::hasFile('file_img')) {

            $file = Input::file('file_img');

            $rules = array(
                'file_img' => 'required|max:10000|mimes:jpeg,png,jpg'
            );

            $validator = Validator::make(Input::all(), $rules);

            if ($validator->fails()) {

                $request->session()->flash('OnlyImg', 'You Can Only Upload Images !!');
                return redirect('CustomizeWeb');

            } else {
                if ($validator->passes()) {

                    $fileimg = $file->getClientOriginalName();
                    $destinationPath = 'img/Logo/';
                    $filemove = $file->move($destinationPath, $fileimg);

                    DB::table('logo')
                        ->where('id', '1')
                        ->update(['fileimg' => $fileimg, 'filemove' => $filemove]);

                    $request->session()->flash('Msg', 'Successfully Updated !!');

                    return redirect('CustomizeWeb');

                }
            }
        } else {

            $request->session()->flash('Msg', 'You Should Upload A Picture !!');

            return redirect('CustomizeWeb');
        }

    }

    public function DeletePoster(Request $request, $id)
    {
        $del = MoviePosters::where('id', $id);

        $files_to_delete = $del->pluck('filemove')->toArray(); //keeping the result in a php
        $del->delete(); //now deleting
        \File::delete($files_to_delete);

        $request->session()->flash('Msg', 'Successfully Deleted !!');

        return redirect('MoviePosters');
    }

}
