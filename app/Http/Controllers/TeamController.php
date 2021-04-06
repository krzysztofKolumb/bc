<?php

namespace App\Http\Controllers;
use App\Models\Expert;
use App\Models\Profession;
use App\Models\Page;
use Illuminate\Http\Request;

class TeamController extends Controller
{

    public function index()
    {
        $page = Page::find(11);
        $teams = Profession::where('type', 1)->get();
        $employeeTeams = Profession::where('type', 2)->get();
        $content=$page->sections->where('name', 'team')->first();
        return view('team.index', compact('page', 'content', 'teams', 'employeeTeams')); 
    }

    public function show(Expert $expert)
    {
        $page = $expert->page;
        return view('team.show', compact('expert', 'page'));
    }

}
