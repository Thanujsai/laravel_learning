<?php

namespace App\Models;
use Illuminate\Support\Arr;

use Illuminate\Database\Eloquent\Model; //importing the Model class from the Eloquent ORM

class Job extends Model{ //to make a php class into the eloquent model it just need to extend the Model class
    protected $table = "job_listings";//since the table name is not the same as the model name, we need to specify the table name, otherwise it's not necessary

    protected $fillable = ['title', 'salary'];//these are the fields that we want to be mass assignable, so we can use the create method to create a new job
}