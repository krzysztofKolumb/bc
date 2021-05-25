<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use App\Models\Page;

class TreatmentController extends Controller
{

    public function index()
    {
        $page = Page::find(22);
        $clinics = Clinic::all();
        $section = $page->section;
        return view('patient-zone.prices.treatments.index', compact('page','section', 'clinics'));
    }
}
