<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Expert;
use App\Models\Profession;

class ConsultationController extends Controller
{
    public function index()
    {
        $page = Page::find(17);
        $professions = Profession::where('type', 1)->get();
        return view('patient-zone.prices.consultations.index', compact('page', 'professions')); 
    }
}
