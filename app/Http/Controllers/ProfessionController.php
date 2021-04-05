<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profession;


class ProfessionController extends Controller
{
    public function index()
    {
        $professions = Profession::all();
        return view('admin.professions.index', compact('professions')); 

    }
}
