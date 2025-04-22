<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts'; // Specify the table name if it doesn't follow Laravel's naming convention
    protected $fillable = ['title', 'description']; // Specify the fillable fields for mass assignment

    public function tags() {//(belongsToMany means Many to Many, in this case, a post can have many tags, and a tag can belong to many posts)
        return $this->belongsToMany(Tag::class, foreignPivotKey: "post_id"); // Specify the foreign key if it's not the default
    } 

}
