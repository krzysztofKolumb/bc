<?php

namespace App\Http\Controllers;

use App\Models\Page;

class AboutController extends Controller
{
    
    public function index()
    {
        $page = Page::find(10);
        $about=$page->sections->where('slug', 'about')->first();
        $gallery=$page->sections->where('slug', 'about-gallery')->first();
        return view('about.index', compact('page', 'about', 'gallery')); 
    }


}
