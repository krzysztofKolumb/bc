<?php

namespace App\Http\Controllers;

use App\Models\ClinicalTrial;
use App\Models\ClinicalTrialCategory;
use App\Models\File;
use App\Models\Offer;
use App\Models\Profession;
use App\Models\Section;

class OfferController extends Controller
{
    public function show(Offer $offer)
    {
        $page = $offer->page;
        $sections = $page->contentSections();
        $professions = Profession::where('type', 1)->get();
        $teams = $page->experts->groupBy('profession_id');

        // pracownia endoskopii
        if($page->id == 5){
            //materiały do pobrania
            $section_treatments = Section::find(40);
            $files = File::where('file_category_id', 3)->orderBy('title', 'asc')->get();
            return view('offer.show', compact('offer','page', 'teams', 'sections', 'professions', 'files', 'section_treatments'));
        }
        elseif($page->id == 6){
            $clinicalTrials = ClinicalTrial::all();
            $categories = ClinicalTrialCategory::all();
            $section = Section::find(39);
            return view('offer.show', compact('offer','page', 'teams', 'sections','clinicalTrials', 'categories', 'professions', 'section'));
        }
        elseif($page->id == 8){
            $section_lab = $page->Section::find(28);
            $section_lab_package = Section::find(29);
            return view('offer.show', compact('offer','page', 'teams', 'sections', 'professions', 'section_lab', 'section_lab_package'));
        }
        else {
            return view('offer.show', compact('offer','page', 'teams', 'sections', 'professions'));
        }
    }

}
