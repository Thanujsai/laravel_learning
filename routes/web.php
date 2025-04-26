<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;//importing the Post class
use App\Http\Controllers\JobController;//importing the JobController class
use App\Http\Controllers\PostController;//importing the PostController class


// Route::get('/', function () {
//     // $jobs = Job::all();

//     // dd($jobs[0]->title);//to check if the jobs are being fetched, to just diplay the title of the first job
//     return view('welcome');//passing an array to the view
// });

Route::view('/','welcome');//this is the same as the above route, but this is a better way to do
Route::controller(JobController::class)->group(function() {
    Route::get('/jobs', 'index');//this will call the index method of the JobController class, this is a better way to do it since it will be more organized and easier to maintain in the future
    Route::get('/jobs/create', 'create');//this should always be above the jobs/{id} route since the route is dynamic and will match any id, including the create route
    Route::get('/jobs/{job}', 'show');//endpoint with id var, wildcard({job}) and the parameter $job needs to be same, next the type
    Route::post('/jobs', 'store');//this will call the store method of the JobController class, this is a better way to do it since it will be more organized and easier to maintain in the future
    //throws a 419 page expired error, this is a CSRF error(cross-site request forgery)
    Route::get('/jobs/{job}/edit', 'edit');//endpoint with id var
    Route::patch('/jobs/{job}', 'update');//patch means update
    Route::delete('/jobs/{job}', 'destroy');//delete means remove
});

Route::view('/contact', 'contact');

//postcontroller routes
Route::get('/posts', [PostController::class, 'index']);//this will call the index method of the PostController class, this is a better way to do it since it will be more organized and easier to maintain in the future
Route::get('/posts/{id}', [PostController::class, 'show']);//this will call the show method of the PostController class, this is a better way to do it since it will be more organized and easier to maintain in the future