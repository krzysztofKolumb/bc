<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Page;
use App\Models\Post;
use Illuminate\Pagination\LengthAwarePaginator;

class NewsController extends Controller
{
    public function index()
    {
        $page = Page::find(12);
        $posts = Post::latest()->paginate(10);

        return view('news.index', compact('page', 'posts')); 
    }

    public function show(Post $post)
    {
        return view('news.show', compact('post'));
    }

    public function page($page=1)
    {
        $collection = Post::all();
        $posts = new LengthAwarePaginator($collection, $collection->count(), 10);
        $posts->resolveCurrentPage($page);
        return view('news.show', compact('posts'));
    }
}
