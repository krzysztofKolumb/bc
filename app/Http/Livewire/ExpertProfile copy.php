<?php

namespace App\Http\Livewire;

use App\Models\Expert;
use App\Models\Degree;
use App\Models\Profession;
use App\Models\Specialty;
use App\Models\Page;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

use Illuminate\Http\Request;


class ExpertProfile extends Component
{

    use WithFileUploads;

    public $expert;
    public $degrees;
    public $professions;
    public $specialties;
    public $specs;
    public $disabled;
    public $pages;
    public $ePages;
    public $file;

    public function mount(Expert $expert)
    {
        $this->expert = $expert;
        $this->degrees=Degree::all();
        $this->specialties = Specialty::all();
        $this->professions = Profession::where('type', 1)->get();
        $this->specs=[];
        $specs=$expert->specialties()->allRelatedIds();
        foreach($specs as $spec){
            $this->specs[$spec]=$spec;
        }
        $this->pages = Page::take(7)->get();
        $this->disabled = '';
        if(Page::find(1)->experts()->count() >= 5){
            $this->disabled='disabled';
        }
        $this->ePages=[];
        $pages=$expert->pages()->allRelatedIds();
        foreach($pages as $page){
            $this->ePages[$page]=$page;
        }

    }

    protected $rules = [
        'expert.firstname' => 'required|string|min:3',
        'expert.lastname' => 'required|string|max:30',
        'expert.degree_id' => 'required',
        'expert.profession_id' => 'required',
        'expert.photo' => 'string|max:500',
        'file'=> 'image|max:1024',
        'specs' => 'required',
        'ePages' => 'required',
    ];

    protected $listeners = ['updateEdu'];


    public function update(){
        $validatedData=$this->validate([
            'expert.firstname' => 'required|string|min:3',
            'expert.lastname' => 'required|string|max:20'
        ]);

        $this->expert->slug = Str::slug($this->expert->firstname . " " . $this->expert->lastname);
        $this->expert->save();
        $this->dispatchBrowserEvent('close');

    }

    public function updateEdu(){
        $validatedData=$this->validate([
            'expert.education' => 'string|min:3',
        ]);

        dd($this->expert->education);

        // $this->expert->save();
        // $this->dispatchBrowserEvent('close');

    }

    public function updateSpecialties(){

        // dd($this->specs);
        // $this->validate($this->specs);
        $array = [];
        foreach($this->specs as $index => $value){
            if($value > 0) {
                $array[$index]=$value;
            }
        }
        $this->expert->specialties()->sync($array);
    }

    public function updatePages(){

        $array = [];
        foreach($this->ePages as $index => $value){
            if($value > 0) {
                $array[$index]=$value;
            }
        }
        $this->expert->pages()->sync($array);
    }

    public function deletePhoto(){
        // Storage::delete($this->expert->photo);
        $this->file = null;
        $this->expert->photo=null;
        $this->expert->save();
    }

    public function render()
    {
        return view('livewire.expert-profile');
    }
}
