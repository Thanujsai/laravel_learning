<?php

namespace App\Models;
use Illuminate\Support\Arr;

use Illuminate\Database\Eloquent\Model; //importing the Model class from the Eloquent ORM
use Illuminate\Database\Eloquent\Factories\HasFactory; //importing the HasFactory trait from the Eloquent ORM
use App\Models\Employer;

class Job extends Model{ //to make a php class into the eloquent model it just need to extend the Model class
    use HasFactory;//Hey, this model has an associated factory, and I might want to generate fake data using it.
    protected $table = "job_listings";//since the table name is not the same as the model name, we need to specify the table name, otherwise it's not necessary

    protected $fillable = ['title', 'salary'];//these are the fields that we want to be mass assignable, so we can use the create method to create a new job

    public function employer()//a job listing belongs to an employer, that is the relation
    {
        return $this->belongsTo(Employer::class);
    }
    // One Employer can have many Jobs.
    // Each Job belongs to one Employer.
    //Employer is there is hire for a job, therefore an employer can have mutiple jobs, therefore job belongs to an employer.
}