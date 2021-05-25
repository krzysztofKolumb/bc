<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Specialty;
use App\Models\Page;
use App\Models\Picture;

class SpecialtyController extends Controller
{

    public function index()
    {
        $specialties = Specialty::orderBy('name', 'asc')->get();
        $page = Page::find(9);
        $section=$page->sections->where('slug', 'specialties')->first();
        $pictures = Picture::where('page_id', 9)->get();
        return view('offer.specialties.index', compact('page', 'section', 'specialties', 'pictures')); 

    }

    public function show(Specialty $specialty)
    {
        return view('offer.specialties.show', ['specialty' => $specialty]);
    }}
