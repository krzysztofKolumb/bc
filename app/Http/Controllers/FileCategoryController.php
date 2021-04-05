<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileCategoryController extends Controller
{
    public function admin()
    {
        return view('admin.file-categories.index'); 
    }
}
