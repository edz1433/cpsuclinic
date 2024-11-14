<?php

use App\Models\City;
use App\Models\Region;
use App\Models\Province;
use App\Models\Barangay;

return [
    'prefix' => '/api/address',

    'middleware' => [
        'web',
        'auth',
    ],

    'publication' => [
        'path' => public_path('publication/PSGC_Publication_Dec2019.xlsx'),
        'sheet' => 4,
    ],

    'models' => [
        'region' => Region::class,
        'province' => Province::class,
        'city' => City::class,
        'barangay' => Barangay::class,
    ],
];
