<?php

namespace App\Http\Livewire;

use App\Models\ClinicalTrial;
use App\Models\Page;
use App\Models\Specialty;
use Livewire\Component;
use Illuminate\Support\Str;


class Specialties extends Component
{
    public $specialties;
    public $current;
    public $specialty;
    public $canDelete = false;

    public function mount(){
        $this->specialties = Specialty::orderBy('name', 'asc')->get();
        $this->specialty = new Specialty();
    }

    protected $rules = [
        'specialty.name' => 'required|string|max:30',
        'current.name' => 'required|string|max:30',
    ];

    protected $messages = [
        'specialty.name.required' => 'To pole jest wymagane.',
        'specialty.name.string' => 'To pole może zawierać jedynie tekst.',
        'specialty.name.max' => 'To pole może zawierać maksymalnie 30 znaków.',
        'current.name.required' => 'To pole jest wymagane.',
        'current.name.string' => 'To pole może zawierać jedynie tekst.',
        'current.name.max' => 'To pole może zawierać maksymalnie 30 znaków.',
    ];

    // protected $listeners = ['mamo'];


    // public function mamo($mamo){
    //     $this->badanie->content = $mamo;
    // }

    public function create(){
        $this->validate([
            'specialty.name' => 'required|string|max:30',
        ]);
        $slug = Str::slug($this->specialty->name);
        $ex = Specialty::where('slug', $slug)->count();
        if($ex > 0){
            $this->addError('unique', 'Specjalizacja już istnieje!');
        }else{
        
        $slug = Str::slug($this->specialty->name);
        $this->specialty->slug = $slug;
        $page = new Page();
        $page->name = $slug;
        $page->title = $this->specialty->name;
        $page->subtitle = 'Specjalizacje';
        $page->meta_title = $this->specialty->name . ' | BodyClinic';
        $page->save();
        $this->specialty->page_id = $page->id;    
        $this->specialty->save();
        $this->specialties = Specialty::orderBy('name', 'asc')->get();
        $message = 'Dodano specjalizację ' . $this->specialty->name . '!';
        $this->dispatchBrowserEvent('close-create-specialty-modal', ['message' => $message]);
        $this->specialty = new Specialty();
        }    
    }

    public function selectedItem($id, $action){
        $specialty = Specialty::find($id);
        $this->current = $specialty;

        if($action == 'update'){
            $this->dispatchBrowserEvent('open-edit-specialty-modal');
        }
        if($action == 'delete'){
            if($specialty->experts->count() < 1){
                $this->canDelete=true;
            }else{
                $this->canDelete=false;
            }
            $this->dispatchBrowserEvent('open-delete-specialty-modal');
        }

    }

    public function cancel(){
        $this->specialty->name = null;
    }

    public function delete(){
        $specialty = $this->current;
        $page = Page::find($specialty->page_id);
        $page->delete();
        $specialty->delete();
        $this->specialties = Specialty::orderBy('name', 'asc')->get();
        $message = 'Usunięto specjalizację!';
        $this->dispatchBrowserEvent('close-delete-specialty-modal', ['message' => $message]);

    }

    public function updateSpecialty(){
        $this->validate([
            'current.name' => 'required|string|max:30',
        ]);
        $this->current->slug = Str::slug($this->current->name);
        $this->current->save();
        $this->specialties = Specialty::orderBy('name', 'asc')->get();
        $message = 'Zapisano zmiany!';
        $this->dispatchBrowserEvent('close-edit-specialty-modal', ['message' => $message]);

    }


    public function render()
    {
        return view('livewire.specialties');
    }
}
