<?php

namespace App\Http\Controllers;
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
        $offer = $home->sections->where('slug', 'home-offer')->first();
        $treatments = $home->sections->where('slug', 'home-treatments')->first();
        $usg = $home->sections->where('slug', 'home-usg')->first();
        $clo = $home->sections->where('slug', 'home-clo')->first();
        $medellan = $home->sections->where('slug', 'home-medellan')->first();
        $about = $home->sections->where('slug', 'home-about')->first();
        $team = $home->sections->where('slug', 'home-team')->first();
        $news = $home->sections->where('slug', 'home-news')->first();
        $posts = Post::latest()->take(2)->get();
        $onLine = $home->sections->where('slug', 'home-on-line')->first();
        return view('home.index', compact('home','offers','offer', 'about', 'usg','medellan', 'clo', 'team', 'news', 'posts', 'treatments', 'onLine')); 
    }

}
