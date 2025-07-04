<?php

return [

    'defaults' => [
        'guard' => 'hr', // guard default menggunakan HR
        'passwords' => 'hrs',
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
        'hr' => [
            'driver' => 'session',
            'provider' => 'hrs', // provider sesuai model HR
        ],
    ],

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],
        'hrs' => [
            'driver' => 'eloquent',
            'model' => App\Models\HR::class, // model HR
        ],
    ],

    'passwords' => [
        'hrs' => [
            'provider' => 'hrs',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,

];
