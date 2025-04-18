<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;//importing the Job class
use App\Models\Post;//importing the Post class

Route::get('/', function () {
    // $jobs = Job::all();

    // dd($jobs[0]->title);//to check if the jobs are being fetched, to just diplay the title of the first job
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

Route::get('/posts', function () {
    return view('posts', [
        'posts' => Post::all(),//using the Post class to get all the posts
    ]);
});

Route::get('/posts/{id}', function ($id){//endpoint with id var
    $post = Post::find($id);//using the Post class to get the post with the id

    //dd($post);//to check if the id is working
    return view('post',[
        'post' => $post,//sending the prop post to the view
    ]);
});