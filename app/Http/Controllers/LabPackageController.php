<?php

namespace App\Http\Controllers;

use App\Models\LabPackage;
use App\Models\Page;
use Illuminate\Http\Request;

class LabPackageController extends Controller
{

    public function index()
    {
        $page = Page::find(24);
        $packages = LabPackage::orderBy('title', 'asc')->get();
        return view('patient-zone.prices.lab-packages.index', compact('page', 'packages')); 
    }

}
