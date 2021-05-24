<?php

namespace App\Http\Livewire;

use App\Models\Degree;
use App\Models\Expert;
use App\Models\Page;
use App\Models\Profession;
use App\Models\Schedule;
use App\Models\Specialty;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Illuminate\Support\Str;

class Experts extends Component
{
    public $professions;
    public $selected;
    public $profession_id='all';

    public $expert;
    public $degrees;
    public $specialties;
    public $pages;
    public $selected_specialties;
    public $selected_pages;

    public function mount() {
        $this->professions = Profession::where('type', 1)->get();

        $this->degrees = Degree::all();
        $this->specialties = Specialty::all();
        $this->pages = Page::take(7)->get();

    }

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }


    protected $rules = [
        'expert.firstname' => 'required|string|min:3',
        'expert.lastname' => 'required|string|max:20',
        'expert.degree_id' => 'required',
        'expert.profession_id' => 'required',
        'selected_specialties' => 'required'
    ];

    protected $messages = [
        'expert.firstname.required' => 'To pole jest wymagane',
        'expert.lastname.required' => 'To pole jest wymagane',
        'expert.degree_id.required' => 'To pole jest wymagane',
        'expert.profession_id.required' => 'To pole jest wymagane',
        'selected_specialties.required' => 'Zaznacz przynajmniej jedną specjalizację',
    ];

    public function openModal(){
        $this->expert = new Expert();
        $message = 'expert-modal';
        $this->dispatchBrowserEvent('open-modal', ['message' => $message]);
    }

    public function create(){
        $this->validate();

        $firstname=$this->expert->firstname;
        $lastname=$this->expert->lastname;
        $degree_id=$this->expert->degree_id;

        $page = new Page;
        $page->name = 'team';
        $page->slug=Str::slug($firstname . " " . $lastname);
        $page->title= Degree::find($degree_id)->name . " " . $firstname . " " . $lastname;
        $page->subtitle='Zespół';
        $page->meta_title= Degree::find($degree_id)->name . " " . $firstname . " " . $lastname . " | BodyClinic";
        $page->save();

        $schedule = new Schedule;
        $schedule->save();

        $this->expert->slug = Str::slug($firstname . " " . $lastname);
        $this->expert->schedule_id=$schedule->id;
        $this->expert->page_id=$page->id;
        $this->expert->save();
        $this->expert->specialties()->attach($this->selected_specialties);
        $this->expert->pages()->attach($this->selected_pages);

        $message = 'Dodano specjalistę!';
        $this->dispatchBrowserEvent('close-modal', ['message' => $message]);

    }












    public function selectedItem($id, $action){

        $this->selected = Expert::find($id);

        if($action == 'delete'){
            $message = 'expert-delete-modal';
            $this->dispatchBrowserEvent('open-modal', ['message' => $message]);
        }
    }

    public function delete(){
        $expert = $this->selected;
        $page = Page::find($expert->page_id);
        if($page){
            $page->delete();
        }
        $expert->pages()->detach();
        $expert->specialties()->detach();
        $schedule = Schedule::find($expert->schedule_id);
        if($schedule){
            $schedule->delete();
        }
        if(Storage::disk('public')->exists('/photos/' . $expert->photo)){
            Storage::disk('public')->delete('/photos/' . $expert->photo);
        }
        $expert->delete();

        $message = 'Usunięto eksperta!';
        $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
    }

    public function render()
    {
        if($this->profession_id == 'all'){
            $experts = Expert::orderBy('lastname', 'asc')->get();
        }else{
            $experts = Expert::where('profession_id', $this->profession_id)->orderBy('lastname', 'asc')->get();
        }
        return view('livewire.experts', compact('experts'));
    }
}
