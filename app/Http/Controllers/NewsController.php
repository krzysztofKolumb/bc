<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Page;
use App\Models\Post;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index()
    {
        $page = Page::find(12);
        $posts = Post::latest()->paginate(10);
        $section = $page->section;

        return view('news.index', compact('page','section', 'posts')); 
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

    public function substr_text_only($string, $limit, $end='...')
    {
        $with_html_count = strlen($string);
        $without_html_count = strlen(strip_tags($string));
        $html_tags_length = $with_html_count-$without_html_count;
        return Str::limit($string, $limit+$html_tags_length, $end);
    }
}
