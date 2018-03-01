<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    
    'google' => [
    'client_id' => '126690931629-cql15dddd1hmteunqrmqa70vej63afqg.apps.googleusercontent.com',
    'client_secret' => 'KvpZatBzI1-VBkP1rrzON6oo',
    'redirect' => 'http://localhost/FinalProject/public/CustomizeWeb',
    ],
    
    'facebook' => [
    'client_id' => '1595301260586796',
    'client_secret' => '7fd7c800e6db52c9e31375e900877b8f',
    'redirect' => 'http://localhost/FinalProject/public/CustomizeWeb',
    ],

];
