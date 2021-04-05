<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Profession;
use Illuminate\Support\Str;


class EmployeeController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth')->except('index', 'show');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $employees = Employee::all();
       $professions = Profession::where('type', 2)->get();

        return view('admin.employees.index', compact('employees', 'professions')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // if(Auth::user()->is_admin == 1){

        //     return view('tasks.create');
        // }
        // else {
        //     return redirect('home');
        // }
    }

    public function addEmployee(Request $request){
        $request->validate([
            'firstname' => 'required|string|min:3',
            'lastname' => 'required|string|min:3',
            'description' => 'required|string|min:5',
            'profession' => 'required',
            'file'=> 'image|max:1024'
        ]);

        $employee = new Employee();
        $employee->firstname = $request->input('firstname');
        $employee->lastname = $request->input('lastname');
        $employee->description = $request->input('description');
        $slug = Str::slug($request->input('firstname') . '-' . $request->input('lastname'));
        $employee->slug = $slug;
        $employee->profession_id = $request->input('profession');
        $extension=null;
        if($request->input('file')){
            $extension = $request->input('file')->extension();
            $employee->photo = $slug . '.' . $extension;
            $request->input('file')->storeAs('files', $slug . '.' . $extension, 'public');
        }    
        $employee->save();    

        return redirect('admin/employees');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->is_admin == 1){
            $employee = new Employee;
            $employee->firstname = $request->input('firstname');
            $employee->lastname = $request->input('lastname');
            $employee->save();

            if($employee){
                return redirect('zespol');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return view('admin.employees.show', ['employee' => $employee]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->is_admin == 1){
            $employee = Employee::findOrFail($id);
            return view('zespol.edit', compact('employee'));
        }
        else {
        // code...
            return redirect('home');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
