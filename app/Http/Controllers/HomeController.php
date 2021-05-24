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
        $about = $home->sections->where('slug', 'home-about')->first();
        $team = $home->sections->where('slug', 'home-team')->first();
        $news = $home->sections->where('slug', 'home-news')->first();
        $treatments = $home->sections->where('slug', 'home-treatments')->first();
        $posts = Post::latest()->take(2)->get();
        $onLine = $home->sections->where('slug', 'home-on-line')->first();
        return view('home.index', compact('home','offers', 'about','team', 'news', 'posts', 'treatments', 'onLine')); 
    }

}
