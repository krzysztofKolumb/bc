<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Degree;


class DegreeController extends Controller
{
    public function index()
    {
        $degrees = Degree::all();
        return view('admin.degrees.index', compact('degrees')); 

    }
}
