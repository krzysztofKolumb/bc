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

    public $name;
    public $name_new;
    public $file_name;
    public $file_extension;

    public $fname;
    public $lname;

    public $photo_default_name="";

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
        'file_name' => 'string'
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
        'file_name.required' => 'To pole nie może być puste'
    ];

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    protected $listeners = ['change'];

    public function change($name, $extension) {
        $this->name= $name;
        $this->file_extension = $extension;
        $slice = Str::beforeLast($name, '.');
        $slug = Str::slug($slice);
        $this->file_name = $slug . "." . $extension;
        $this->file_extension = $extension;
        $this->file_name = Str::slug($this->employee->firstname . " " .$this->employee->lastname) . "." . $extension;
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

    public function addPicture(){

        if($this->file){
            $this->validate([
                'file'=> 'image|max:1024',
                'file_name' => 'required|string'
            ]);
            // $slug = Str::slug($this->employee->firstname . '-' . $this->employee->lastname);
            // $photo = $slug . '.' . $this->file->extension();

            $slice = Str::beforeLast($this->file_name, '.');
            $photo = Str::slug($slice) . '.' . $this->file->extension();

            if( Storage::disk('public')->exists('/photos/' . $photo) ){
                $this->addError('unique', 'Zdjęcie o podanej nazwie już istnieje!');
            }else {
                $this->file->storeAs('photos', $photo, 'public');
                $this->employee->photo = $photo;
                $this->employee->save();
                $message = 'Dodano zdjęcie!';
                $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
            }
        }
    }

    public function selectedItem($id, $action){
        $employee = Employee::find($id);
        $this->employee = $employee;
        $this->selected_photo = $employee->photo;

        if($action == 'update'){
            $this->action = 'update';
            $this->fname = $employee->firstname;
            $this->lname = $employee->lasttname;
            $this->file = null;
            $this->file_name = Str::slug($employee->firstname . ' ' . $employee->lastname);
            $message = 'employee-modal';
            $this->dispatchBrowserEvent('open-modal', ['message' => $message]);
        }

        if($action == 'addPicture'){
            $this->action = 'addPicture';
            $this->file = null;
            $this->name = null;
            $this->file_name = null;
            $this->file_extension = null;
            $message = 'picture-modal';
            $this->dispatchBrowserEvent('open-modal', ['message' => $message]);
        }

        if($action == 'deletePicture'){
            $this->action = 'deletePicture';
            $message = 'picture-delete-modal';
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
                'file_name' => 'string'
            ]);
            $name = $slug . '.' . $this->file->extension();
            if($this->file_name) {
                $name = $this->file_name;
            }
            $this->file->storeAs('photos', $name, 'public');
            $this->employee->photo = $name;
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
            $this->employee->photo=null;
            $this->employee->save();
            $this->selected_photo=null;
            $message = 'Usunięto zdjęcie!';
            $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
        }
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
