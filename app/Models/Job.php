<?php

namespace App\Models;
use Illuminate\Support\Arr;

use Illuminate\Database\Eloquent\Model; //importing the Model class from the Eloquent ORM
use Illuminate\Database\Eloquent\Factories\HasFactory; //importing the HasFactory trait from the Eloquent ORM
use App\Models\Employer;

class Job extends Model{ //to make a php class into the eloquent model it just need to extend the Model class
    use HasFactory;//Hey, this model has an associated factory, and I might want to generate fake data using it.
    protected $table = "job_listings";//since the table name is not the same as the model name, we need to specify the table name, otherwise it's not necessary

    // protected $fillable = ['employer_id', 'title', 'salary'];//these are the fields that we want to be  mass assignable, so we can use the create method to create a new job

    protected $guarded = [];//this means all of the fields can be mass assigned, if you add anything to this array, it will be blocked from mass assignment, so you can use this if you want to be explicit about which fields are not mass assignable

    public function employer()//a job listing belongs to an employer, that is the relation
    {
        return $this->belongsTo(Employer::class);
    }
    // One Employer can have many Jobs.
    // Each Job belongs to one Employer.
    //Employer is there is hire for a job, therefore an employer can have mutiple jobs, therefore job belongs to an employer.

    public function tags()//a job listing can have many tags, that is the relation
    {
        return $this->belongsToMany(Tag::class, foreignPivotKey: "job_listing_id");//since the foreign key is not job_id but job_listing_id, we need to specify the foreign key name, otherwise it's not necessary
    }
}

/*

    What is Mass Assignment?
    Mass assignment is when you do something like:

    Job::create([
        'title' => 'Manager',
        'salary' => 50000,
        'employer_id' => 1
    ]);
    Laravel protects your model from accidentally or maliciously updating fields you didn't intend (like is_admin, id, etc.) through mass assignment.

    ✅ Line 1 — $fillable (Allowlist)
    protected $fillable = ['employer_id', 'title', 'salary'];
    This is an allowlist of fields that you want to be mass assignable. You can use this if you want to be explicit about which fields are mass assignable.

    This means:
    🟢 ONLY these fields (employer_id, title, salary) are allowed to be mass-assigned.

    Everything else will be ignored even if included in the create() or update() method.

    Use $fillable if you want to explicitly allow only safe fields.

    🚫 Line 2 — $guarded (Blocklist)
    protected $guarded = [];

    This means:
    🔓 No fields are guarded, i.e., everything is mass assignable.

    It’s the same as saying:

    “I trust everything coming into this model, so go ahead and assign all fields.”

*/