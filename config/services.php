<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
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

    /**
     * Login facebook
     */
    'facebook' => [
        'client_id' => '170180510061479',
        'client_secret' => 'a7233d153dcd55b3b1661212beeb8685',
        'redirect' => 'http://localhost:8000/callback/facebook',
    ],

    /**
     * Login twitter
     */
    'twitter' => [
        'client_id' => 'BTskur2a7p7t9JTUV2Xk1v9s0',
        'client_secret' => '1PQmpfnlpPcBgrTf3blR5caCLqOVFNWb1N9vlSd2e7Qeym4lJt',
        'redirect' => 'http://localhost:8000/callback/twitter',
    ],

    /**
     * Login google
     */
    'google' => [
        'client_id' => '1033604411000-qs2tcfnqmq7tra3p4gp0tq0nua7v7m48.apps.googleusercontent.com',
        'client_secret' => 'o3g6smlCAf6gT5D9PJWpyn0h',
        'redirect' => 'http://localhost:8000/callback/google',
    ],
];
