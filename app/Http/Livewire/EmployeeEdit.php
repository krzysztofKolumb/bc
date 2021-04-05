<?php

namespace App\Http\Livewire;

use App\Models\Employee;
use App\Models\Profession;
use Livewire\Component;

class EmployeeEdit extends Component
{
    public $employee;
    public $professions;

    public function mount()
    {
        // $this->employee = $employee;
        $this->professions = Profession::where('type', 2)->get();

    }

        protected $rules = [
        'employee.firstname' => 'required|string|min:5',
        'employee.lastname' => 'required|string|max:30',
        'employee.description' => 'required|string|min:5',
        'employee.profession_id' => 'required',
    ];

    protected $listeners = ['delete', 'current', 'mamo'];

    public function mamo($id){
        $employee = Employee::find($id);

        $this->employee = $employee;
    }

    public function current($employee){
        $this->employee = $employee;
    }

    public function render()
    {
        return view('livewire.employee-edit');
    }
}
