<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expert;
use App\Models\Degree;
use App\Models\Profession;
use App\Models\Schedule;
use App\Models\Page;
use Illuminate\Support\Str;

class ExpertController extends Controller
{
    public function index()
    {
        $experts = Expert::all();
        $professions = Profession::where('type', 1)->get();
        return view('admin.experts.index',compact('experts', 'professions')); 
    }

    public function create()
    {
        return view('admin.experts.create'); 
    }

    public function show(Expert $expert)
    {
        return view('admin.experts.show', ['expert' => $expert]);
    }

    public function upload(Request $request)
    {
        
        $request->validate([
            'content' => 'required|string|min:3',
        ]);
    }

    public function updateProfile(Request $request){
        $request->validate([
            'id' => 'required',
            'content' => 'required|string',
            'category' => 'required|string',
        ]);

        $expert=Expert::find($request->input('id'));
        $expert->update([$request->input('category') => $request->input('content')]);
        session()->flash('message', 'Zaktualizowano profil');
        return redirect('admin/experts/' . $expert->slug);

    }

    public function store(Request $request)
    {

        $request->validate([
            'firstname' => 'required|string|max:20',
            'lastname' => 'required|string|max:20',
            'degree_id' => 'required'

        ]);

        $expert = new Expert;
        $expert->firstname = $request->input('firstname');
        $expert->lastname = $request->input('lastname');
        $expert->degree_id = $request->input('degree_id');
        $expert->profession_id = $request->input('profession_id');
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $slug = $firstname . " " . $lastname;
        $expert->slug = Str::slug($slug);
        
        $schedule = new Schedule;
        $schedule->save();
        $expert->schedule_id = $schedule->id;
        $degree_id = $request->input('degree_id');
        $page = new Page;
        $page->name= Str::slug($slug);
        $page->title= Degree::find($degree_id)->name . " " . $firstname . " " . $lastname;
        $page->subtitle='Zespół';
        $page->meta_title= Degree::find($degree_id)->name . " " . $firstname . " " . $lastname . " | BodyClinic";

        $page->save();
        $expert->page_id = $page->id;

        $specialties[] = $request->input('specialties');
        $expert->save();

        foreach($specialties as $specialty){
            $expert->specialties()->attach($specialty);
        }

        if($request->input('home')){
            Page::find(1)->experts()->attach($expert);
        }

        $offers[] = $request->input('offers');
        foreach($offers as $offer){
            $expert->pages()->attach($offer);
        }

        session()->flash('message', 'Dodano specjalistę!');
        return redirect('admin/experts');
    }

    public function destroy($id)
    {
            $experts = Expert::all();
            Expert::find($id)->delete();
            // $expert=$experts->where('id',$id)->get;
            // $expert->where('id',$id)->delete();
            // $expert->delete();
            // $pageId = $expert->page()->id;
            // Page::find($pageId)->delete();
            // $expert->page()->detach();
            // $pages = Expert::find($id)->pages()->detach($id);
            // Page::where('id',$id)->delete();
            session()->flash('message', 'Users Deleted Successfully.');
            return redirect('admin/experts');
    }

}
