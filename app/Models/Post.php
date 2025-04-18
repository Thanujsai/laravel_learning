<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts'; // Specify the table name if it doesn't follow Laravel's naming convention
    protected $fillable = ['title', 'description']; // Specify the fillable fields for mass assignment
}
