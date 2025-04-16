<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;


$jobs = [
    [
        'id' => 1,
        'title' => 'Director',
        'salary' => '$50,000',
    ],
    [
        'id' => 2,
        'title' => 'Programmer',
        'salary' => '$10,000',
    ],
    [
        'id' => 3,
        'title' => 'Teacher',
        'salary' => '$40,000',
    ],
];

Route::get('/', function () {
    return view('welcome');//passing an array to the view
});

Route::get('/jobs', function () use ($jobs) {
    return view('jobs', [
        'jobs' => $jobs
    ]);
});

Route::get('/jobs/{id}', function ($id) use ($jobs){//endpoint with id var
    $job = Arr::first($jobs,fn($job) => $job['id'] == $id);//using the Arr class to get the first item from the array);,get the first item from the array which matches the id mentioned

    //dd($job);//to check if the id is working
    return view('job',[
        'job' => $job,//sending the prop job to the view
    ]);
});

Route::get('/contact', function () {
    return view('contact');
});
