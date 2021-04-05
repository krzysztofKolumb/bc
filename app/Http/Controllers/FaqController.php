<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;
use App\Models\Page;

class FaqController extends Controller
{
    public function index()
    {
        $page = Page::find(19);
        $faqs = Faq::all();
        return view('patient-zone.faq.index', compact('page', 'faqs')); 
    }

    public function admin()
    {
        return view('admin.faq.index'); 
    }

    public function show($id)
    {
        $faq = Faq::find($id);
        return view('admin.faq.show', compact('faq')); 
    }

    public function store(Request $request){

        $request->validate([
            'question' => 'required|string',
            'answear' => 'string',
        ]);

        $faq= new Faq();
        $faq->question = $request->input('question');
        $faq->answear = $request->input('answear');
        $faq->save();
    }

    public function update(Request $request){

        $request->validate([
            'faq_id' => 'required',
            'question' => 'required|string',
            'answear' => 'string',
        ]);

        $faq= Faq::find($request->input('faq_id'));
        $faq->question = $request->input('question');
        $faq->answear = $request->input('answear');
        $faq->update();
    }
}


