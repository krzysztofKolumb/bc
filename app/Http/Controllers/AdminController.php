<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClinicalTrial;
use App\Models\ClinicalTrialCategory;
use App\Models\Degree;
use App\Models\Employee;
use App\Models\Expert;
use App\Models\Page;
use App\Models\Profession;
use App\Models\Specialty;
use App\Models\Admin;
use App\Models\Post;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    function login(){
        return view('auth.login');
    }
    function register(){
        return view('auth.register');
    }
    function save(Request $request){
        
        //Validate requests
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:admins',
            'password'=>'required|min:5|max:12'
        ]);

         //Insert data into database
         $admin = new Admin;
         $admin->name = $request->name;
         $admin->email = $request->email;
         $admin->password = Hash::make($request->password);
         $save = $admin->save();

         if($save){
            return back()->with('success','Zapisano nowego użytkownika');
         }else{
             return back()->with('fail','Coś poszło nie tak, spróbuj jeszcze raz');
         }
    }

    function check(Request $request){
        //Validate requests
        $request->validate([
             'email'=>'required|email',
             'password'=>'required|min:5|max:12'
        ]);

        $userInfo = Admin::where('email','=', $request->email)->first();

        if(!$userInfo){
            return back()->with('fail','Nieprawidłowe dane');
        }else{
            //check password
            if(Hash::check($request->password, $userInfo->password)){
                $request->session()->put('LoggedUser', $userInfo->id);
                return redirect('admin');
                // return redirect('admin/dashboard');
            }else{
                return back()->with('fail','Nieprawidłowe dane');
            }
        }
    }

    function logout(){
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('/auth/login');
        }
    }

    function dashboard(){
        $data = ['LoggedUserInfo'=>Admin::where('id','=', session('LoggedUser'))->first()];
        return view('admin.dashboard', $data);
    }

    function settings(){
        $data = ['LoggedUserInfo'=>Admin::where('id','=', session('LoggedUser'))->first()];
        return view('admin.settings', $data);
    }

    function profile(){
        $data = ['LoggedUserInfo'=>Admin::where('id','=', session('LoggedUser'))->first()];
        return view('admin.profile', $data);
    }
    function staff(){
        $data = ['LoggedUserInfo'=>Admin::where('id','=', session('LoggedUser'))->first()];
        return view('admin.staff', $data);
    }
    
    public function index()
    {
        $experts = Expert::all();
        $specialties = Specialty::all();
        $posts = Post::all();
        $trials = ClinicalTrial::all();
        return view('admin.index', compact('experts', 'specialties', 'posts', 'trials'));
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
