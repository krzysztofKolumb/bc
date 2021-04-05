<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class AboutController extends Controller
{
    
    public function index()
    {
        $page = Page::find(10);
        $about=$page->sections->where('name', 'about')->first();
        return view('about.index', compact('page', 'about')); 
    }


}
