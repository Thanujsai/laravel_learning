<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome', [
        'jobs' => [
            [
                'title' => 'Director',
                'salary' => '$50,000',
            ],
            [
                'title' => 'Programmer',
                'salary' => '$10,000',
            ],
            [
                'title' => 'Teacher',
                'salary' => '$40,000',
            ],
        ]
    ]);//passing an array to the view
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});
