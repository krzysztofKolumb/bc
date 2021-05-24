<?php

namespace App\Http\Controllers;

use App\Models\Expert;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    public function index()
    {
        $expert = Expert::find(1);
        return view('admin.index', compact('expert')); 
    }

    public function contact()
    {
        return view('admin.pages.contact');
    }

    public function pictures()
    {
        return view('admin.pictures.index');
    }

    // public function store(Request $request)
    // {
    //     $input = $request->all();
    //     $expert = Expert::find(1);

    //     $request->validate([
    //         'content' => 'required'
    //     ]);

    //     $expert->education=$request->input('content');
    //     $expert->save();

    // }
}
