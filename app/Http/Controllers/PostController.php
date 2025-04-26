<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; // Importing the Post class

class PostController extends Controller
{
    public function index()
    {
        return view('posts', [
            'posts' => Post::all(),
        ]);
    }

    public function show($id)
    {
        $post = Post::with('tags')->find($id);

        return view('post', [
            'post' => $post,
        ]);
    }
}
