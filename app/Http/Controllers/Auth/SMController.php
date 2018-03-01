<?php

namespace App\Http\Controllers\Auth;

use Socialite;
use App\Http\Controllers\Controller;

class SMController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Google.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('google')->user();
        dd($user);
        // $user->token;
    }
    
    public function redirectToProviderFB()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from Google.
     *
     * @return Response
     */
    public function handleProviderCallbackFB()
    {
        $user = Socialite::driver('facebook')->user();
        dd($user);
        // $user->token;
    }
    
}