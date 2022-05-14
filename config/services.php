<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'google' => [
        'client_id' => '934196010830-crqbjncsi878ajs38l6ujesrect43mrl.apps.googleusercontent.com',
        'client_secret' => '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',
        // 'redirect' => 'http://localhost:8000/JobPortal/google/callback',
        'redirect' => 'http://localhost:8000/JobPortal/callback',
    ],
    'facebook' => [
        'client_id' => '524157536033952',
        'client_secret' => 'a0930183bc4ab4a664d8465f26e676fd',
        // 'redirect' => 'http://localhost:8000/JobPortal/google/callback',
        'redirect' => 'http://localhost:8000/JobPortal/fbcallback',
    ],

];
