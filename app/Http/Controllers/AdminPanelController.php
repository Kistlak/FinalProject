<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Illuminate\Support\Facades\Input;
use DB;

class AdminPanelController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = User::all();
        return view('AdminPanel.AdminPanel', compact('data'));
    }

    public function adinsert(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:users,email'
        ]);

        if (Input::hasFile('file_img')) {

            $file = Input::file('file_img');

            $rules = array(
                'file_img' => 'required|max:10000|mimes:jpeg,png,jpg'
            );

            $validator = Validator::make(Input::all(), $rules);

            if ($validator->fails()) {

                $request->session()->flash('OnlyImg', 'You Can Only Upload Images !!');
                return redirect('adminPanel');
            } else {
                if ($validator->passes()) {

                    $fileimg = $file->getClientOriginalName();
                    $destinationPath = 'img/Admins/';
                    $filemove = $file->move($destinationPath, $fileimg);

                    User::create([
                        'username' => request('username'),
                        'email' => request('email'),
                        'password' => request('password'),
                        'fileimg' => $fileimg,
                        'filemove' => $filemove
                    ]);

                    $request->session()->flash('Msg', 'Successfully Inserted !!');

                    return redirect('adminPanel');
                }
            }
        } else {

            User::create(request(['username', 'email', 'password']));

            $request->session()->flash('Msg', 'Successfully Inserted !!');

            return redirect('adminPanel');
        }

    }

    public function edit(User $edd)
    {
        return view('AdminPanel.AdminUpdate', compact('edd'));

    }

    public function adminedit(Request $request, $id)
    {
        // Add Validation

        $users = User::find($id);
        $users->username = $request->get('username');
        $users->email = $request->get('email');

        $this->validate($request, [
            'email' => "required|email|unique:users,email,$id"
        ]);

        if (Input::hasFile('file_img')) {

            $file = Input::file('file_img');

            $rules = array(
                'file_img' => 'required|max:10000|mimes:doc,docx,jpeg,png,jpg'
            );

            $validator = Validator::make(Input::all(), $rules);

            if ($validator->fails()) {

                $request->session()->flash('OnlyImg', 'You Can Only Upload Images !!');
                return redirect('AdminUpdate');

            } else {
                if ($validator->passes()) {

                    $fileimg = $file->getClientOriginalName();
                    $destinationPath = 'img/Admins/';
                    $filemove = $file->move($destinationPath, $fileimg);

                    $users->fileimg = $fileimg;
                    $users->filemove = $filemove;

                    $users->update();

                    $request->session()->flash('Msg', 'Successfully Updated !!');

                    return redirect('adminPanel');

                }
            }
        } else {

            $users->update();

            $request->session()->flash('Msg', 'Successfully Updated !!');

            return redirect('adminPanel');
        }


    }

    public function DeleteUser(Request $request, $id)
    {
        $del = User::where('id', $id);

        $files_to_delete = $del->pluck('filemove')->toArray(); //keeping the result in a php
        $del->delete(); //now deleting
        \File::delete($files_to_delete);

        $request->session()->flash('Msg', 'Successfully Deleted !!');

        return redirect('adminPanel');
    }

    public function approvededit(Request $request, $id)
    {
        // Add Validation

        DB::table('users')
            ->where('id', $id)
            ->update(['action' => 1]);

            $request->session()->flash('Msg', 'Successfully Approved !!');

            return redirect('adminPanel');

    }

    public function rejectededit(Request $request, $id)
    {
        // Add Validation

        DB::table('users')
            ->where('id', $id)
            ->update(['action' => 2]);

        $request->session()->flash('Msg', 'Rejected !!');

        return redirect('adminPanel');

    }

}
