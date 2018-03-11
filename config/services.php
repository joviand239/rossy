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
        'region' =>  env('SES_REGION'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\Base\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

	'google' => [
		'client_id' => env('GOOGLE_OAUTH_CLIENT_ID'),
		'client_secret' => env('GOOGLE_OAUTH_CLIENT_SECRET'),
		'redirect' => url('/admin/socialite/handle/google'),
	],

	'facebook' => [
		'client_id' => env('FACEBOOK_APP_ID'),
		'client_secret' => env('FACEBOOK_SECRET'),
		'redirect' => url('/admin/socialite/handle/facebook'),
	],

];
