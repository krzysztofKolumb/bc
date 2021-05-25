<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\FileCategory;

class FilesController extends Controller
{
    public function index()
    {
        $page = Page::find(20);
        $categories=FileCategory::orderBy('name', 'asc')->get();
        $section = $page->section;
        $desc=$page->sections->first();
        return view('patient-zone.files.index', compact('page','section', 'desc', 'categories')); 
    }

}
