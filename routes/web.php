<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;//importing the Job class
use App\Models\Post;//importing the Post class

Route::get('/', function () {
    // $jobs = Job::all();

    // dd($jobs[0]->title);//to check if the jobs are being fetched, to just diplay the title of the first job
    return view('welcome');//passing an array to the view
});

//index
Route::get('/jobs', function () {
    $jobs = Job::with('employer')->latest()->paginate(3);//using the Job class to get all the jobs, and also fetch the related employer in the same database query.//paginate shows the page numbers whereas simple paginate just shows 2 buttons next and previous,  3 here means 3 records must be there per page
    return view('jobs.index', [
        'jobs' => $jobs,//using the Job class to get all the jobs
        //'jobs' => Job::all() queries the database for all jobs and returns them as a collection
        //example:
        //It does this for each and every job : select * from "employers" where "employers"."id" = 1 limit 1 which is not efficient, this is called lazy loading
        //whereas Job::with('employer')->get(); this will do it in one query like this : select * from "employers" where "employers"."id" in (1, 2, 3, 4, 5, 6, 7, 8), this is caller eager loading
    ]);
});

//create
Route::get('/jobs/create', function () {//this should always be above the jobs/{id} route since the route is dynamic and will match any id, including the create route
    return view('jobs.create');
});

//show
Route::get('/jobs/{id}', function ($id){//endpoint with id var
    $job = Job::with('tags')->find($id);//fetch the job with this ID, and also fetch its related tags in the same database query.

    //dd($job);//to check if the id is working
    return view('jobs.show',[
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

//store
  Route::post('/jobs',function() {
    //dd(request()->all());//this will dump the request data, and stop the execution of the code,request()->all() will get all the data from the request, and return it as an array

    request()->validate([//this will validate the request data, and if it fails, it will redirect back to the previous page with the errors
        'title' => ['required','min:3'],//the title is required, corresponding to the name of the input field in the form (name="title")
        'salary' => ['required','numeric'],//the salary is required and must be a number
    ]);//if this validation fails, it will redirect back to the previous page with the errors

    Job::create([//create a new job using the Job class
        'title' => request('title'),//request('title') will get the title from the request
        'salary' => request('salary'),
        'employer_id' => 1
    ]);

    return redirect('/jobs');//redirecting to the jobs page after creating the job
});
//throws a 419 page expired error, this is a CSRF error(cross-site request forgery)

//edit
Route::get('/jobs/{id}/edit', function ($id){//endpoint with id var
    $job = Job::with('tags')->find($id);//fetch the job with this ID, and also fetch its related tags in the same database query.

    //dd($job);//to check if the id is working
    return view('jobs.edit',[
        'job' => $job,//sending the prop job to the view
    ]);
});

//update
Route::patch('/jobs/{id}', function ($id){//patch means update
    //validate the request data
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required', 'numeric'],
    ]);

    //authorize
    //update the job and persist
    $job = Job::findOrFail($id);//using the findOrFail method to get the job with the id, if it doesn't exist, it will throw a 404 error

    $job->update([
        'title' => request('title'),
        'salary' => request('salary'),
    ]);
 
    //redirect to the jobs page
    return redirect('/jobs/'.$job->id);//redirecting to the jobs page after updating the job
    
});
 
//delete
Route::delete('/jobs/{id}', function ($id){//delete means remove
    //authorize
    //delete the job and persist
    $job = Job::findOrFail($id);//using the findOrFail method to get the job with the id, if it doesn't exist, it will throw a 404 error

    $job->delete();//delete the job

    //redirect to the jobs page
    return redirect('/jobs');//redirecting to the jobs page after deleting the job
});