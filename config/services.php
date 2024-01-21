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
        'domain' => env('rozatowel.aharian.ir'),
        'secret' => env('3b97dce117181b680dd5040fcc4194c6-9525e19d-2e53e094'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => env('SES_REGION', 'us-east-1'),
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
        'client_id'     => '301115610869-cur99qs4iq3i6bgtbs61lo5adds06rp3.apps.googleusercontent.com',
        'client_secret' => 'EybjiKAJ6yoE4-oaoH_bVDmx',
        'redirect'      => 'https://arastowel.com/auth/google/callback'
    ],

    'zarinpal' => [
        'merchantID' => '152f2756-fac7-11e8-8ec3-005056a205be',
        'zarinGate' => false,
        'sandbox' => false,
    ],

];
