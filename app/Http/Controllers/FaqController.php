<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Page;

class FaqController extends Controller
{
    public function index()
    {
        $page = Page::find(19);
        $section = $page->section;
        $faqs = Faq::all();
        return view('patient-zone.faq.index', compact('page','section', 'faqs')); 
    }

}


