<?php

namespace App\Http\Controllers;

use App\Models\ClinicalTrial;
use App\Models\ClinicalTrialCategory;
use App\Models\Degree;
use App\Models\Employee;
use App\Models\Expert;
use App\Models\Page;
use App\Models\Profession;
use App\Models\Specialty;

class AdminController extends Controller
{
    
    public function index()
    {
        $expert = Expert::find(1);
        return view('admin.index', compact('expert')); 
    }

    public function experts()
    {
        $experts = Expert::all();
        $professions = Profession::where('type', 1)->get();
        return view('admin.experts.index',compact('experts', 'professions')); 
    }

    public function expertShow(Expert $expert)
    {
        return view('admin.experts.show', ['expert' => $expert]);
    }

    public function employees()
    {
       $employees = Employee::all();
       $professions = Profession::where('type', 2)->get();
        return view('admin.employees.index', compact('employees', 'professions')); 
    }

    public function specialties()
    {
        $specialties = Specialty::orderBy('name', 'asc')->get();
        return view('admin.specialties.index', compact('specialties')); 
    }

    public function degrees()
    {
        $degrees = Degree::all();
        return view('admin.degrees.index', compact('degrees')); 
    }

    public function professions()
    {
        $professions = Profession::all();
        return view('admin.professions.index', compact('professions')); 
    }

    public function labTests()
    {
        return view('admin.lab-tests.index'); 
    }

    public function labTestsCategories(){
        return view('admin.lab-test-categories.index'); 
    }

    public function packages()
    {
        return view('admin.lab-packages.index'); 
    }

    public function treatments()
    {
        return view('admin.treatments.index');
    }

    public function clinics()
    {
        return view('admin.clinics.index'); 
    }

    public function files()
    {
        return view('admin.files.index'); 
    }

    public function filesCategories()
    {
        return view('admin.file-categories.index'); 
    }

    public function faq()
    {
        return view('admin.faq.index'); 
    }

    public function posts()
    {
        return view('admin.posts.index'); 
    }

    public function recommendations()
    {
        return view('admin.recommendations.index'); 
    }

    public function trials(){
        $trials = ClinicalTrial::all();
        $categories = ClinicalTrialCategory::all();
        return view('admin.clinical-trials.index', compact('trials', 'categories')); 
    }

    public function trialsCategories(){
        $categories = ClinicalTrialCategory::all();
        return view('admin.clinical-trials-categories.index', compact('categories')); 
    }

    public function consultations()
    {
        return view('admin.consultations.index'); 
    }

    public function contact()
    {
        return view('admin.pages.contact');
    }

    public function pages()
    {

        return view('admin.pages.index');
    }

    public function page(Page $page)
    {
        return view('admin.pages.show', ['page' => $page]);
    }

    public function home()
    {
        return view('admin.pages.home'); 
    }

    public function about()
    {
        return view('admin.pages.about'); 
    }

    public function pictures()
    {
        return view('admin.pictures.index');
    }

}
