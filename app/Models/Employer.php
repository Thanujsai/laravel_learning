<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    /** @use HasFactory<\Database\Factories\EmployerFactory> */
    use HasFactory;

    //An employer can take care of multiple jobs.
    //this builds the relation between employer and jobs
    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}
