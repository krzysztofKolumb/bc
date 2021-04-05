<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function admin()
    {
        return view('admin.posts.index'); 
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('admin.posts.show', compact('post')); 
    }

    public function store(Request $request){

        $request->validate([
            'content' => 'required|string',
            'title' => 'required|string',
        ]);

        $post= new Post();
        $slug = Str::slug($request->input('title'));
        $post->title = $request->input('title');
        $post->slug = $slug;
        $post->content = $request->input('content');
        $post->save();
    }

    public function update(Request $request){

        $request->validate([
            'post_id' => 'required',
            'content' => 'required|string',
            'title' => 'required|string',
        ]);

        $post= Post::find($request->input('post_id'));
        $slug = Str::slug($request->input('title'));
        $post->title = $request->input('title');
        $post->slug = $slug;
        $post->content = $request->input('content');
        $post->update();
    }
}
