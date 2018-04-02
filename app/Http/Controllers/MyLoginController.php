<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class MyLoginController extends Controller
{

    public function loginprocess(Request $request)
    {
        //dd($request->all());

        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            $user = User::where('email', $request->email)->first();

            return redirect('/AdminPanel');
        } else {
            return redirect('/login');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/login');
    }

}
