<?php

namespace App\Http\Controllers;

use App\Models\ClinicalTrialCategory;
use Illuminate\Http\Request;

class ClinicalTrialCategoryController extends Controller
{
    
    public function index(){
        $categories = ClinicalTrialCategory::all();
        return view('admin.clinical-trials-categories.index', compact('categories')); 
    }
}
