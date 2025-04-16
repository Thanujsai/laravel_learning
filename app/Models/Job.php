<?php

namespace App\Models;
use Illuminate\Support\Arr;


class Job{
    public static function all(): array { //returning an array
        return [
            [
                'id' => 1,
                'title' => 'Director',
                'salary' => '$50,000',
            ],
            [
                'id' => 2,
                'title' => 'Programmer',
                'salary' => '$10,000',
            ],
            [
                'id' => 3,
                'title' => 'Teacher',
                'salary' => '$40,000',
            ],
        ];
    }

    public static function find(int $id) : array { //returning an array
        return Arr::first(static::all(),fn($job) => $job['id'] == $id);//using the Arr class to get the first item from the array);,get the first item from the array which matches the id mentioned, static means we are referring this current class
    }
}