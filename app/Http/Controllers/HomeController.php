<?php

namespace App\Http\Controllers;
use App\Models\News;
use App\Models\Page;
use App\Models\Offer;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $home = Page::find(1);
        $offers = Offer::all();
        $about = $home->sections->where('name', 'home-about')->first();
        $team = $home->sections->where('name', 'home-team')->first();
        $news = $home->sections->where('name', 'home-news')->first();
        $posts = Post::latest()->take(2)->get();
        $onLine = $home->sections->where('name', 'home-on-line')->first();
        return view('home.index', compact('home','offers', 'about','team', 'news', 'posts', 'onLine')); 
    }

    public function upload(){
        dd('boze');
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $request->validate([
            'content' => 'required'

        ]);
    }
}
