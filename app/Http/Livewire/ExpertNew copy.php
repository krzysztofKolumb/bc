<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Expert;
use App\Models\Degree;
use App\Models\Page;
use App\Models\Specialty;
use App\Models\Profession;
use App\Models\Schedule;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class ExpertNew extends Component
{
    use WithFileUploads;

    public Expert $expert;
    public Page $page;
    public Schedule $schedule;
    public $degrees;
    public $degree;
    public $specialties;
    public $specs;
    public $professions;
    public $file;
    public $photo_tmp_name;
    public $step;
    public $pages;
    public $ePages;
    public $disabled;
    public $photo_extension = "";
    public $expert_slug;

    private $stepActions = [
        'submit1',
        'submit2',
        'submit3',
    ];

    protected $listeners = ['change'];

    public function mount() {
        $this->step = 0;
        $this->expert = new Expert;
        $this->page = new Page;
        $this->schedule = new Schedule;
        $this->degrees = Degree::all();
        $this->specialties = Specialty::all();
        $this->professions = Profession::where('type', 1)->get();
        //oferta
        $this->pages = Page::take(7)->get();
        // Na stronie głównej może być tylko 4 specjalistów
        $this->disabled = '';
        if(Page::find(1)->experts()->count() >= 4){
            $this->disabled='disabled';
        }
    }

    protected $rules = [
        'expert.firstname' => 'required|string|min:3',
        'expert.lastname' => 'required|string|max:20',
        'expert.degree_id' => 'required',
        'expert.profession_id' => 'required',
        'expert.photo' => 'string|max:500',
        'file'=> 'image|max:1024',
        'schedule.mon' => 'string|max:200',
        'schedule.tue' => 'string|max:200',
        'schedule.wed' => 'string|max:200',
        'schedule.thu' => 'string|max:200',
        'schedule.fri' => 'string|max:200',
        'schedule.sat' => 'string|max:200',
        'schedule.info' => 'string|max:500',
        'photo_tmp_name' => 'string|max:200'
    ];

    protected $messages = [
        'specs.required' => 'Zaznacz przynajmniej jedną specjalizację',
        'expert.firstname.min' => 'Imię musi zawierać przynajmniej 3 znaki',
        'expert.lastname.max' => 'Nazwisko nie może być dłuższe niż 20 znaków',
    ];

    public function decreaseStep()
    {
        $this->step--;
    }

    public function change(){
        $this->photo_tmp_name = $this->file->getClientOriginalName();
        $this->expert->photo = $this->file->getClientOriginalName();
        $this->photo_extension = $this->file->extension();

    }

    public function submit() {
        $action = $this->stepActions[$this->step];
        $this->$action();
    }

    public function submit1() {
        $validatedData=$this->validate([
            'expert.firstname' => 'required|string|min:3',
            'expert.lastname' => 'required|string|max:20',
            'expert.degree_id' => 'required',
            'expert.profession_id' => 'required',
            'specs' => 'required'
        ]);

        if($validatedData){
            $this->expert_slug = Str::slug($this->expert->firstname . " " . $this->expert->lastname);
            $degree = Degree::find($this->expert->degree_id);
            $this->degree = $degree->name;
        }
        $this->step++;
    }

    public function submit2() {
        if($this->file){
            $validatedData=$this->validate([
                'file'=> 'required|image|max:1024',
                'expert.photo' => 'required|string|max:200'
            ]);
            if(Storage::disk('public')->exists('/photos/' . $this->expert->photo)){
                $this->addError('unique', 'Zdjęcie o podanej nazwie już istnieje!');
            }else {
            $this->extension = $this->file->extension();
            // $this->expert->photo= $this->expert_slug . "." . $this->file->extension();
            $this->step++;
            }
        }else{
            $this->step++;
        }
    } 
    
    public function submit3() {
        $validatedData=$this->validate([
            'schedule.mon' => 'string|max:200',
            'schedule.tue' => 'string|max:200',
            'schedule.wed' => 'string|max:200',
            'schedule.thu' => 'string|max:200',
            'schedule.fri' => 'string|max:200',
            'schedule.sat' => 'string|max:200',
            'schedule.info' => 'string|max:500'
        ]);

        $firstname=$this->expert->firstname;
        $lastname=$this->expert->lastname;
        $degree_id=$this->expert->degree_id;

        $this->page->slug=Str::slug($firstname . " " . $lastname);
        $this->page->title= Degree::find($degree_id)->name . " " . $firstname . " " . $lastname;
        $this->page->subtitle='Zespół';
        $this->page->meta_title= Degree::find($degree_id)->name . " " . $firstname . " " . $lastname . " | BodyClinic";
        $this->page->save();
        $this->schedule->save();

        if($this->file){
            $this->file->storeAs('photos', $this->expert->photo, 'public');
        }
        $this->expert->slug = Str::slug($firstname . " " . $lastname);
        $this->expert->schedule_id=$this->schedule->id;
        $this->expert->page_id=$this->page->id;
        $this->expert->save();
        $this->expert->specialties()->attach($this->specs);
        $this->expert->pages()->attach($this->ePages);
        $this->step++;
    } 

    public function delete(){
        $this->file = null;
        $this->expert->photo=null;
    }

    public function render()
    {
        return view('livewire.expert-new');
    }
}
