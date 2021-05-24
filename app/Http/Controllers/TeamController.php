<?php

namespace App\Http\Controllers;

use App\Http\Livewire\Recommendations;
use App\Models\Expert;
use App\Models\Profession;
use App\Models\Page;
use App\Models\Recommendation;
use Illuminate\Http\Request;

class TeamController extends Controller
{

    public function index()
    {
        $page = Page::find(11);
        $teams = Profession::where('type', 1)->get();
        $employeeTeams = Profession::where('type', 2)->get();
        return view('team.index', compact('page', 'teams', 'employeeTeams')); 
    }

    public function show(Expert $expert)
    {
        $page = $expert->page;
        $recommendations = Recommendation::where('recommended_expert_id', $expert->id)->get();
        return view('team.show', compact('expert', 'page', 'recommendations'));
    }

}
