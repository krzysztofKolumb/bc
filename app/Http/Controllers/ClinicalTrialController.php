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
        $desc=$page->sections->first();

        return view('offer.clinical-trials.index', compact('page', 'desc', 'categories', 'clinicalTrials')); 

    }


    public function show(ClinicalTrial $clinicalTrial)
    {
        return view('offer.clinical-trials.show', ['clinicalTrial' => $clinicalTrial]);
    }

    public function adminIndex(){
        $trials = ClinicalTrial::all();
        $categories = ClinicalTrialCategory::all();
        return view('admin.clinical-trials.index', compact('trials', 'categories')); 
    }

    public function adminShow($id)
    {
        $clinicalTrial = ClinicalTrial::find($id);
        $categories = ClinicalTrialCategory::all();
        $selectedID = $clinicalTrial->clinicalTrialCategory->id;
        return view('admin.clinical-trials.show', compact('clinicalTrial', 'categories', 'selectedID')); 
    }

    public function update(Request $request){

        $request->validate([
            'id' => 'required',
            'content' => 'required|string',
            'title' => 'required|string',
            'category' => 'required',
        ]);

        $clinicalTrial=ClinicalTrial::find($request->input('id'));
        $clinicalTrial->update(['content' => $request->input('content'),
         'title'=>$request->input('title'),
         'clinical_trial_category_id'=>$request->input('category')
         ]);
    }

    public function delete(Request $request){
        $request->validate([
            'id' => 'required'
        ]);

        $clinicalTrial = ClinicalTrial::find($request->input('id'));
        $clinicalTrial->delete();

    }

    public function store(Request $request){

        $request->validate([
            'content' => 'required|string',
            'title' => 'required|string',
            'category' => 'required',
        ]);

        $clinicalTrial= new ClinicalTrial();
        $clinicalTrial->title = $request->input('title');
        $clinicalTrial->clinical_trial_category_id = $request->input('category');
        $clinicalTrial->content = $request->input('content');
        $clinicalTrial->save();
    }
}
