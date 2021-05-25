<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{

    public function show($id)
    {
        $post = Post::find($id);
        return view('admin.posts.show', compact('post')); 
    }
}
