<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /** @use HasFactory<\Database\Factories\TagFactory> */
    use HasFactory;

    public function jobs()
    {
        return $this->belongsToMany(Job::class, relatedPivotKey: "job_listing_id"); //since the related key is not job_id but job_listing_id, we need to specify the related key name, otherwise it's not necessary
    } //a tag can have many jobs, that is the relation

    public function posts()
    {
        return $this->belongsToMany(Post::class, foreignPivotKey: "post_id"); // Specify the foreign key if it's not the default
    } //a tag can have many posts, that is the relation
}

/*

public function jobs()
{
    return $this->belongsToMany(Job::class);
}
Laravel looks for a pivot table name that is the alphabetical combination of the two related model names in snake_case and singular:

php
Copy
Edit
Tag + Job => job_tag ✅
Job + Tag => job_tag ✅ (Laravel alphabetizes them: job, tag)

*/