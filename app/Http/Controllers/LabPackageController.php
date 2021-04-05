<?php

namespace App\Http\Controllers;

use App\Models\LabPackage;
use App\Models\Page;
use Illuminate\Http\Request;

class LabPackageController extends Controller
{

    public function index()
    {
        $page = Page::find(24);
        $packages = LabPackage::orderBy('title', 'asc')->get();
        return view('patient-zone.prices.lab-packages.index', compact('page', 'packages')); 
    }

    public function admin()
    {
        return view('admin.lab-packages.index'); 
    }

    public function show($id)
    {
        $labPackage = LabPackage::find($id);
        return view('admin.lab-packages.show', compact('labPackage')); 
    }

    public function store(Request $request){

        $request->validate([
            'content' => 'required|string',
            'title' => 'required|string',
            'price' => 'required|string',
        ]);

        $labPackage= new LabPackage();
        $labPackage->title = $request->input('title');
        $labPackage->price = $request->input('price');
        $labPackage->content = $request->input('content');
        $labPackage->save();

        // $clinicalTrial->save(['content' => $request->input('content'),
        //  'title'=>$request->input('title'),
        //  'clinical_trial_category_id'=>$request->input('category')
        //  ]);

        // session()->flash('message', 'Zaktualizowano informacje!');
        // return redirect('admin/experts/' . $expert->slug);

    }

    public function update(Request $request){
        $request->validate([
            'package_id' => 'required',
            'content' => 'required|string',
            'title' => 'required|string',
            'price' => 'required|string',
        ]);

        $labPackage= LabPackage::find($request->input('package_id'));
        $labPackage->title = $request->input('title');
        $labPackage->price = $request->input('price');
        $labPackage->content = $request->input('content');
        $labPackage->update();
    }

    
}
