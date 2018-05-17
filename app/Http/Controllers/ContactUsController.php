<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactUs;

class ContactUsController extends Controller
{
    public function index()
    {
        return view('Master.ContactUs');
    }

    public function cuinsert(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:users,email'
        ]);

            ContactUs::create(request(['name', 'email', 'num', 'msg']));

            $request->session()->flash('Msg', 'Successfully Inserted !!');

            return redirect('contactus');
        }

}
