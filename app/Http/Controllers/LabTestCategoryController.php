<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LabTestCategoryController extends Controller
{
    public function index(){
        return view('admin.lab-test-categories.index'); 
    }
}
