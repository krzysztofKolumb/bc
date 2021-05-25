<?php

namespace App\Http\Controllers;

use App\Models\ClinicalTrial;
use App\Models\ClinicalTrialCategory;
use App\Models\Expert;
use Illuminate\Http\Request;
use App\Models\Page;


class ClinicalTrialController extends Controller
{

    public function index()
    {
        $page = Page::find(6);
        $clinicalTrials = ClinicalTrial::all();
        $categories = ClinicalTrialCategory::all();
        $section=$page->sections->where('slug', 'badania-kliniczne')->first();
        $desc=$page->sections->first();
        return view('offer.clinical-trials.index', compact('page', 'section', 'desc', 'categories', 'clinicalTrials')); 
    }

}
