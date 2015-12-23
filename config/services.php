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

    'mandrill' => [
        'secret' => env('MANDRILL_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'weixinweb' => [
        'client_id' => 'wx3bbe4d851173e3a6',
        'client_secret' => '40f2417cd268d43bc1f71be247cdce9b',
        'redirect' => 'http://www.yuexiameigui.com/auth/callback/weixinweb'
    ],
    'weixin' => [
        'client_id' => 'wx58ff9f9c7b2ce4d9',
        'client_secret' => '9b741bb366f47b43bbba664a979cee3a',
        'redirect' => 'http://dev.meiguihuakai.com/auth/socialite/callback/weixin'
    ]
];
