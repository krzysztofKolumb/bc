<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecommendationController extends Controller
{
    public function admin()
    {
        return view('admin.recommendations.index'); 
    }
}