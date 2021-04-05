<?php

namespace App\Http\Livewire;

use App\Models\Employee;
use App\Models\Profession;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class Employees extends Component
{
    public $employee;
    public $professions;
    public $file;

    public $employee_id='';
    public $current;
    public $current_file;
    public $currentHasPhoto=false;
    public $toDelete;
    public $deleteMessage=null;

    public $action;
    public $profession_id='all';
    public $selected_photo;

    use WithFileUploads;

    public function mount()
    {
        $this->professions = Profession::where('type', 2)->get();
        $this->action = 'create';
    }

    protected $rules = [
        'employee.firstname' => 'required|string|max:30',
        'employee.lastname' => 'required|string|max:30',
        'employee.description' => 'required|string|max:100',
        'employee.photo' => 'string|max:100',
        'employee.profession_id' => 'required',
        'file'=> 'image|max:1024',
    ];

    protected $messages = [
        'employee.firstname.required' => 'To pole jest wymagane.',
        'employee.firstname.string' => 'To pole może zawierać jedynie tekst.',
        'employee.firstname.max' => 'To pole może zawierać maksymalnie 30 znaków.',
        'employee.lastname.required' => 'To pole jest wymagane.',
        'employee.lastname.string' => 'To pole może zawierać jedynie tekst.',
        'employee.lastname.max' => 'To pole może zawierać maksymalnie 30 znaków.',
        'employee.description.required' => 'To pole jest wymagane.',
        'employee.description.string' => 'To pole może zawierać jedynie tekst.',
        'employee.description.max' => 'To pole może zawierać maksymalnie 100 znaków.',
        'employee.profession_id.required' => 'To pole jest wymagane.',
        'file.required' => 'To pole jest wymagane.',
        'file.image' => 'Musisz wybrać zdjęcie.',
        'file.max' => 'To zdjęcie jest za duże.',
        'current.firstname.required' => 'To pole jest wymagane.',
        'current.firstname.string' => 'To pole może zawierać jedynie tekst.',
        'current.firstname.max' => 'To pole może zawierać maksymalnie 30 znaków.',
        'current.lastname.required' => 'To pole jest wymagane.',
        'current.lastname.string' => 'To pole może zawierać jedynie tekst.',
        'current.lastname.max' => 'To pole może zawierać maksymalnie 30 znaków.',
        'current.description.required' => 'To pole jest wymagane.',
        'current.description.string' => 'To pole może zawierać jedynie tekst.',
        'current.description.max' => 'To pole może zawierać maksymalnie 100 znaków.',
        'current.profession_id.required' => 'To pole jest wymagane.',
        'current_file.required' => 'To pole jest wymagane.',
        'current_file.image' => 'Musisz wybrać zdjęcie.',
        'current_file.max' => 'To zdjęcie jest za duże.',
    ];

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function openModal(){
        $this->employee = new Employee();
        $this->action = 'create';
        $this->file = null;
        $this->selected_photo = null;
        $message = 'employee-modal';
        $this->dispatchBrowserEvent('open-modal', ['message' => $message]);
    }

    public function addEmployee(){
        $this->validate([
            'employee.firstname' => 'required|string|max:30',
            'employee.lastname' => 'required|string|max:30',
            'employee.description' => 'required|string|max:100',
            'employee.profession_id' => 'required',
        ]);
        $slug = Str::slug($this->employee->firstname . '-' . $this->employee->lastname);
        $this->employee->slug = $slug;

        if($this->file){
            $this->validate([
                'file'=> 'image|max:1024',
            ]);
            $this->file->storeAs('photos', $slug . '.' . $this->file->extension(), 'public');
            $this->employee->photo = $slug . '.' . $this->file->extension();
        }
        $this->employee->save();
        $this->employee = new Employee();
        $this->file = null;
        $message = 'Dodano pracownika!';
        $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
    }

    public function selectedItem($id, $action){
        $employee = Employee::find($id);
        $this->employee = $employee;
        $this->selected_photo = $employee->photo;

        if($action == 'update'){
            $this->action = 'update';
            $message = 'employee-modal';
            $this->dispatchBrowserEvent('open-modal', ['message' => $message]);
        }
        if($action == 'delete'){
            $message = 'delete-employee-modal';
            $this->dispatchBrowserEvent('open-modal', ['message' => $message]);
        }

    }

    public function delete(){
        if(Storage::disk('public')->exists('/photos/' . $this->employee->photo)){
            Storage::disk('public')->delete('/photos/' . $this->employee->photo);
        }
        $this->employee->delete();
        $message = 'Usunięto pracownika!';
        $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
    }

    public function cancelChanges(){
        $this->current->firstname=null;
        $this->current->lastname=null;
        $this->current->description=null;
        $this->current->profession_id=null;
        $this->current_file=null;
        $this->currentHasPhoto=false;
    }

    public function cancelEmployee(){
        $this->employee=null;
        $this->file=null;
    }

    public function cancelAddModal(){
        $this->employee->firstname=null;
        $this->employee->lastname=null;
        $this->employee->description=null;
        $this->employee->profession_id=null;
        $this->file=null;
    }

    public function saveChanges(){
        $this->validate([
            'employee.firstname' => 'required|string|max:30',
            'employee.lastname' => 'required|string|max:30',
            'employee.description' => 'required|string|max:100',
            'employee.profession_id' => 'required',
        ]);
        $slug = Str::slug($this->employee->firstname . ' ' . $this->employee->lastname);
        if($this->file){
            $this->validate([
                'file'=> 'image|max:1024',
            ]);
            $this->file->storeAs('photos', $slug . '.' . $this->file->extension(), 'public');
            $this->employee->photo = $slug . '.' . $this->file->extension();
        }
        $this->employee->slug = $slug;
        $this->employee->update();
        $message = 'Zapisano zmiany!';
        $this->file=null;
        $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
    }

    public function deletePhoto(){
        if(Storage::disk('public')->exists('/photos/' . $this->employee->photo)){
            Storage::disk('public')->delete('/photos/' . $this->employee->photo);
        }
        $this->employee->photo=null;
        $this->employee->save();

        $this->selected_photo=null;
    }

    public function render()
    {
        if($this->profession_id == 'all'){
            $employees = Employee::orderBy('lastname', 'asc')->get();
        }else{
            $employees = Employee::where('profession_id', $this->profession_id)->orderBy('lastname', 'asc')->get();
        }
        return view('livewire.employees', compact('employees'));
    }
}
