<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Profession;

class RegistrationController extends Controller
{
    public function index()
    {
        $page = Page::find(15);
        $desc=$page->sections->first();
        $profession = Profession::find(6);
        $files = File::where('file_category_id', 5)->orderBy('title', 'asc')->get();
        return view('patient-zone.registration.index', compact('page', 'desc', 'profession', 'files')); 
    }
}
