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
        $pictures = Picture::where('page_id', 9)->get();
        return view('offer.specialties.index', compact('page', 'specialties', 'pictures')); 

    }

    public function adminIndex()
    {
        $specialties = Specialty::orderBy('name', 'asc')->get();
        return view('admin.specialties.index', compact('specialties')); 

    }

    public function show(Specialty $specialty)
    {
        return view('offer.specialties.show', ['specialty' => $specialty]);
    }}
