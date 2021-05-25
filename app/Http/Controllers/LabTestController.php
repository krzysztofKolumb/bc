<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\LabTestCategory;
use App\Models\LabPackage;
use App\Models\Page;
use App\Models\Profession;

class LabTestController extends Controller
{
    public function index()
    {
        $categories = LabTestCategory::orderBy('name', 'asc')->get();
        $packages = LabPackage::all();
        $profession = Profession::find(5);
        $file = File::find(8);
        $page = Page::find(8);
        $section=$page->sections->where('slug', 'badania-lab')->first();
        $desc=$page->sections->first();
        return view('offer.lab.index', compact('page', 'desc', 'section', 'categories', 'packages', 'profession', 'file')); 
    }

    public function priceList()
    {
        $categories = LabTestCategory::orderBy('name', 'asc')->get();
        $page = Page::find(23);
        $desc=$page->sections->first();
        return view('patient-zone.prices.lab-tests.index', compact('page', 'desc', 'categories')); 
    }

}
