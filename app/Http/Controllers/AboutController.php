<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Picture;

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
