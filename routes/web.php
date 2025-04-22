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
    $jobs = Job::with('employer')->get();//using the Job class to get all the jobs, and also fetch the related employer in the same database query.
    return view('jobs', [
        'jobs' => $jobs,//using the Job class to get all the jobs
        //'jobs' => Job::all() queries the database for all jobs and returns them as a collection
        //example:
        //It does this for each and every job : select * from "employers" where "employers"."id" = 1 limit 1 which is not efficient, this is called lazy loading
        //whereas Job::with('employer')->get(); this will do it in one query like this : select * from "employers" where "employers"."id" in (1, 2, 3, 4, 5, 6, 7, 8), this is caller eager loading
    ]);
});

Route::get('/jobs/{id}', function ($id){//endpoint with id var
    $job = Job::with('tags')->find($id);//fetch the job with this ID, and also fetch its related tags in the same database query.

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
    $post = Post::with('tags')->find($id);//using the Post class to get the post with the id

    //dd($post);//to check if the id is working
    return view('post',[
        'post' => $post,//sending the prop post to the view
    ]);
});