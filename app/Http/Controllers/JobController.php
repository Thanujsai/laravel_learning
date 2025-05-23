<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;//importing the Job class
use Illuminate\Support\Facades\Mail;
use App\Mail\JobPosted;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with('employer')->latest()->paginate(3);//using the Job class to get all the jobs, and also fetch the related employer in the same database query.//paginate shows the page numbers whereas simple paginate just shows 2 buttons next and previous,  3 here means 3 records must be there per page
        return view('jobs.index', [
            'jobs' => $jobs,//using the Job class to get all the jobs
            //'jobs' => Job::all() queries the database for all jobs and returns them as a collection
            //example:
            //It does this for each and every job : select * from "employers" where "employers"."id" = 1 limit 1 which is not efficient, this is called lazy loading
            //whereas Job::with('employer')->get(); this will do it in one query like this : select * from "employers" where "employers"."id" in (1, 2, 3, 4, 5, 6, 7, 8), this is caller eager loading
        ]);
    }

    public function create()
    {
        return view('jobs.create');//this will return the create view
    }

    public function show(Job $job)
    {
        //dd($job);//to check if the id is working
        return view('jobs.show',[
            'job' => $job,//sending the prop job to the view
        ]);
    }

    public function store()
    {
        //dd(request()->all());//this will dump the request data, and stop the execution of the code,request()->all() will get all the data from the request, and return it as an array

        request()->validate([//this will validate the request data, and if it fails, it will redirect back to the previous page with the errors
            'title' => ['required','min:3'],//the title is required, corresponding to the name of the input field in the form (name="title")
            'salary' => ['required','numeric'],//the salary is required and must be a number
        ]);//if this validation fails, it will redirect back to the previous page with the errors

        $job = Job::create([//create a new job using the Job class
            'title' => request('title'),//request('title') will get the title from the request
            'salary' => request('salary'),
            'employer_id' => 1
        ]);

        //send the email to the user
        Mail::to($job->employer->user)->queue(//laravel directly fetches the email address off the user, queue is better since mail takes some time to send a mail, instead push the mail into queue and send it later
            new JobPosted($job)
        );
        

        return redirect('/jobs');//redirecting to the jobs page after creating the job
    }

    public function edit(Job $job)
    {
        /* authorize method will  run the logic associated with the name of the policy method, in this case, edit-job.
            if it fails or returns false it will throw a 403 error, which means forbidden, and the user is not authorized to perform this action.
        */
        //The definition of the edit-job method is in the App\Providers\AppServiceProvider class, which is where we define the authorization logic for our application.
        //dd($job);//to check if the id is working

        // if(Gate::denies('edit-job', $job)) {
        //     abort(403);
        // }

        return view('jobs.edit',[
            'job' => $job,//sending the prop job to the view
        ]);
    }

    public function update(Job $job)
    {

        //authorize
        //Gate::authorize('edit', $job); i dont need this anymore since im using jobpolicy for authorization

        //validate the request data
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required', 'numeric'],
        ]);

        //update the job and persist

        $job->update([
            'title' => request('title'),
            'salary' => request('salary'),
        ]);
    
        //redirect to the jobs page
        return redirect('/jobs/'.$job->id);//redirecting to the jobs page after updating the job
    }

    public function destroy(Job $job)
    {
        //authorize
        //Gate::authorize('edit', $job);
        
        //delete the job and persist

        $job->delete();//delete the job

        //redirect to the jobs page
        return redirect('/jobs');//redirecting to the jobs page after deleting the job
    }
}
