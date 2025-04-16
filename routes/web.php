<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;//importing the Job class

Route::get('/', function () {
    return view('welcome');//passing an array to the view
});

Route::get('/jobs', function () {
    return view('jobs', [
        'jobs' => Job::all(),//using the Job class to get all the jobs
    ]);
});

Route::get('/jobs/{id}', function ($id){//endpoint with id var
    $job = Job::find($id);//using the Job class to get the job with the id

    //dd($job);//to check if the id is working
    return view('job',[
        'job' => $job,//sending the prop job to the view
    ]);
});

Route::get('/contact', function () {
    return view('contact');
});
