<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'description'];//these are the fields that we want to be mass assignable, so we can use the create method to create a new job
}
