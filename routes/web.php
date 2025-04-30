<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post; // importing the Post class
use App\Http\Controllers\JobController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;

// ----------------------------------
// Welcome Page
// ----------------------------------

// Route::get('/', function () {
//     // $jobs = Job::all();
//     // dd($jobs[0]->title); // to check if the jobs are being fetched, to just display the title of the first job
//     return view('welcome'); // passing an array to the view
// });

Route::view('/', 'welcome'); // this is the same as the above route, but this is a better way to do

// ----------------------------------
// Contact Page
// ----------------------------------

Route::view('/contact', 'contact');

// ----------------------------------
// Job Controller Routes
// ----------------------------------

Route::controller(JobController::class)->group(function () {
    // using this instead of the resource method since we want to add middleware only to some specific routes

    Route::get('/jobs', 'index'); // this will call the index method of the JobController class, this is a better way to do it since it will be more organized and easier to maintain in the future

    Route::get('/jobs/create', 'create'); // this should always be above the jobs/{id} route since the route is dynamic and will match any id, including the create route

    Route::get('/jobs/{job}', 'show'); // endpoint with id var, wildcard({job}) and the parameter $job needs to be same, next the type

    Route::post('/jobs', 'store')->middleware('auth'); 
    // this will call the store method of the JobController class, this is a better way to do it since it will be more organized and easier to maintain in the future
    // throws a 419 page expired error, this is a CSRF error (cross-site request forgery)

    Route::get('/jobs/{job}/edit', 'edit')
        ->middleware('auth')//middleware('auth') is used to protect routes by ensuring that only authenticated (logged-in) users can access them.
        ->can('edit','job'); //This triggers the edit method in the JobPolicy class
        // endpoint with id var, the job in the can string refers to the wildcard variable job present in the get url /jobs/{job}/edit
        // The can() method is used to check if the currently authenticated user has the appropriate permissions to perform the requested action.
        // The method edit is present in job policy

        /*
            ✅ middleware('auth') → Authentication
            Checks if the user is logged in.

            If not logged in, Laravel redirects to the login page.

            If logged in, continues to the next step.

            ✅ can('edit-job,job') → Authorization
            Checks if the logged-in user is allowed to edit this specific job.

            Refers to a Gate (defined in AppServiceProvider or AuthServiceProvider):

        */

    Route::patch('/jobs/{job}', 'update')
        ->middleware('auth')//middleware('auth') is used to protect routes by ensuring that only authenticated (logged-in) users can access them.
        ->can('edit','job'); // patch means update

    Route::delete('/jobs/{job}', 'destroy')
        ->middleware('auth')//middleware('auth') is used to protect routes by ensuring that only authenticated (logged-in) users can access them.
        ->can('edit','job'); ; // delete means remove
});

// Route::resource('jobs', JobController::class)->middleware('auth'); 
// jobs is the resource name or uri, route resource registers all of the routes for a resource controller, this is a better way to do
// the middleware auth checks for the user to be logged in, if not, it will redirect to the login page
// the middleware auth gets applied to every single route that this generates
// Laravel's built-in auth middleware relies on the route named login to redirect unauthenticated users.
// Laravel checks if the user is authenticated before allowing access to any of the /jobs routes.
// If the user isn't logged in, Laravel will try to redirect them to the login page. But how does it know which URL is the login page? — it looks for a route named login.
// auth is a built-in middleware provided by Laravel that:
// Checks if the user is logged in.
// If yes, lets the request continue.
// If not, redirects to the login page (the route named login).

/*
    When you use:

    Route::resource('jobs', JobController::class);
    👉 Yes — it expects the JobController to have these specific method names:

    HTTP Verb    URI              Controller Method    Purpose
    GET          /jobs            index()              Display a list of jobs
    GET          /jobs/create     create()             Show a form to create a new job
    POST         /jobs            store()              Save the new job
    GET          /jobs/{job}      show()               Display a single job
    GET          /jobs/{job}/edit edit()               Show a form to edit a job
    PATCH/PUT    /jobs/{job}      update()             Update the job
    DELETE       /jobs/{job}      destroy()            Delete the job
*/

/*
    If you don't want to generate a particular route, you can use the except method to exclude it:
    Route::resource('jobs', JobController::class)->except(['create', 'edit']);
    This will generate all the routes except the create and edit routes.

    If you want to generate only a few routes, you can use the only method to include only those routes:
    Route::resource('jobs', JobController::class)->only(['index', 'show']);
    This will generate only the index and show routes.
*/

// ----------------------------------
// Post Controller Routes
// ----------------------------------

// Route::controller(PostController::class)->group(function() {
//     Route::get('/posts', 'index');
//     Route::get('/posts/{id}', 'show');
// });

Route::resource('posts', PostController::class); 
// posts is the resource name or uri, route resource registers all of the routes for a resource controller, this is a better way to do

// ----------------------------------
// Auth Routes
// ----------------------------------

Route::get('/register', [RegisteredUserController::class, 'create']);

Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login'); 
// this will name the route login, so that the above middleware can redirect to this route
// Giving a name to the /login is essential because Laravel's built-in auth middleware relies on the route named login to redirect unauthenticated users.

Route::post('/login', [SessionController::class, 'store']);

Route::post('/logout', [SessionController::class, 'destroy'])->name('logout'); 
// this will name the route logout, so we can use it in the view
