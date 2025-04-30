<?php

namespace App\Policies;

use App\Models\Job;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class JobPolicy
{
    public function edit(User $user, Job $job):bool //returns a boolean
    {
        //dd($user);
        return $job->employer->user->is($user);//look at the user who created the job, and check if it is the same as the user who is logged in, i.e. check employer_id in the job_listings table -> check user id corresponding to the employer_id in the job_listings table -> check if the user id is the same as the logged in user id
            //this will check if the user is authorized to edit the job, if not, it will throw a 403 error
    }
}
