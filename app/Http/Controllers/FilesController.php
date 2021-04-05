<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\File;
use App\Models\FileCategory;


class FilesController extends Controller
{
    public function index()
    {
        $page = Page::find(20);
        $categories=FileCategory::orderBy('name', 'asc')->get();
        $desc=$page->sections->first();

        return view('patient-zone.files.index', compact('page', 'desc', 'categories')); 
    }

    public function admin()
    {
        return view('admin.files.index'); 
    }
}
