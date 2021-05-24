<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use App\Models\Page;
use App\Models\Profession;
use Illuminate\Http\Request;
use App\Models\Treatment;


class TreatmentController extends Controller
{

    public function index()
    {
        $page = Page::find(22);
        $clinics = Clinic::all();
        $section = $page->section;
        return view('patient-zone.prices.treatments.index', compact('page','section', 'clinics'));
    }

    public function admin()
    {
        return view('admin.treatments.index');
    }


    public function show(Treatment $treatment)
    {
        $page=$treatment->page;
        $offer = $treatment->offer;
        $professions = Profession::where('type', 1)->get();
        $desc=$page->sections->first();
        $teams = $offer->page->experts->groupBy('profession_id');
        // return view('offer.treatments.show', compact('page', 'offer', 'desc', 'professions', 'grouped'));
        return view('offer.show', compact('page', 'offer', 'desc', 'professions', 'teams'));

    }
}
