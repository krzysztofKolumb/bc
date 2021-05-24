<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Expert;
use App\Models\Profession;


class ScheduleController extends Controller
{
    public function index()
    {
        $page = Page::find(16);
        $experts = Expert::orderBy('lastname', 'asc')->get();
        $professions = Profession::where('type', 1)->get();
        return view('patient-zone.schedule.index', compact('page', 'professions', 'experts')); 
    }
}
