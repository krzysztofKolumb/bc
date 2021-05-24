<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function index()
    {

        return view('admin.pages.index');
    }

    public function show(Page $page)
    {
        return view('admin.pages.show', ['page' => $page]);
    }

    public function home()
    {
        return view('admin.pages.home'); 
    }

    public function about()
    {
        return view('admin.pages.about'); 
    }
}
