<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Job;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::preventLazyLoading();

        // Gate::define('edit-job', function(User $user, Job $job) {
        //     return $job->employer->user->is($user);//look at the user who created the job, and check if it is the same as the user who is logged in, i.e. check employer_id in the job_listings table -> check user id corresponding to the employer_id in the job_listings table -> check if the user id is the same as the logged in user id
        //     //this will check if the user is authorized to edit the job, if not, it will throw a 403 error
        // });
    }
}

// You should put the Gate::define(...) logic in the App\Providers\AppServiceProvider (or any service provider, but typically AppServiceProvider) and 
//not in the controller because authorization gates are part of the application's global authorization logic, not specific controller behavior. 