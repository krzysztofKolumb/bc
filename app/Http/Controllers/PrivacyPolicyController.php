<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class PrivacyPolicyController extends Controller
{
    public function index()
    {
        $page = Page::find(18);
        $desc=$page->sections->first();
        return view('patient-zone.privacy-policy.index', compact('page', 'desc')); 
    }
}
