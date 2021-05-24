<?php

namespace App\Http\Livewire;

use App\Models\Degree;
use App\Models\Expert;
use App\Models\Page;
use App\Models\Profession;
use App\Models\Specialty;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class ExpertEdit extends Component
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
    public $schedule;
    public $page;
    public $file;
    public $hasPhoto;
    public $file_name;
    public $file_name_new;
    public $file_extension;
    public $photo_tmp_name;
    public $photo_extension = "";

    public $changed = false;

    public function mount(Expert $expert)
    {
        $this->expert = $expert;
        $this->degrees=Degree::all();
        $this->specialties = Specialty::all();
        $this->professions = Profession::where('type', 1)->get();
        if($expert->photo == null){$this->hasPhoto=false;}else {$this->hasPhoto=true;}
        $this->schedule=$expert->schedule;
        $this->file_name_new = $expert->photo;
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
        $this->page = $expert->page;

    }

    protected $rules = [
        'expert.firstname' => 'required|string|min:3',
        'expert.lastname' => 'required|string|max:30',
        'expert.degree_id' => 'required',
        'expert.profession_id' => 'required',
        'expert.photo' => 'string|max:500',
        'schedule.mon' => 'string|max:40',
        'schedule.tue' => 'string|max:40',
        'schedule.wed' => 'string|max:40',
        'schedule.thu' => 'string|max:40',
        'schedule.fri' => 'string|max:40',
        'schedule.sat' => 'string|max:40',
        'schedule.info' => 'string|max:200',
        'file'=> 'image|max:1024',
        'file_name' => 'string|min:3',
        'file_name_new' => 'string|min:3',
        'specs' => 'required',
        'ePages' => 'required',
        'page.meta_title' => 'string|max:255',
        'page.meta_description' => 'string|max:255',

    ];

    protected $listeners = ['change'];

    public function change(){
        $this->photo_tmp_name = $this->file->getClientOriginalName();
        $this->expert->photo = $this->file->getClientOriginalName();
        $this->photo_extension = $this->file->extension();

    }

    public function update(){
        $validatedData=$this->validate([
            'expert.firstname' => 'required|string|min:3',
            'expert.lastname' => 'required|string|max:20',
            'expert.degree_id' => 'required',
            'expert.profession_id' => 'required'
        ]);

        $this->expert->slug = Str::slug($this->expert->firstname . " " . $this->expert->lastname);
        $this->expert->save();

        if($this->changed === true){
            return redirect('admin/experts/' . $this->expert->slug);
        }

        $message = 'Zaktualizowano dane podstawowe!';
        $this->dispatchBrowserEvent('alert', ['message' => $message]);
    }

    public function updatedExpertFirstname(){
        $this->changed= true;
    }	

    public function updatedExpertLastname(){
        $this->changed= true;
    }

    public function updateSpecialties(){
        $array = [];
        foreach($this->specs as $index => $value){
            if($value > 0) {
                $array[$index]=$value;
            }
        }
        $this->expert->specialties()->sync($array);
        $message = 'Zaktualizowano specjalizacje!';
        $this->dispatchBrowserEvent('alert', ['message' => $message]);
    }

    public function updatePhoto(){
        $validatedData=$this->validate([
            'file'=> 'required|image|max:1024',
        ]);
        if(Storage::disk('public')->exists('/photos/' . $this->expert->photo)){
            $this->addError('unique', 'Zdjęcie o podanej nazwie już istnieje!');
        }else {
            $this->file->storeAs('photos', $this->expert->photo, 'public');
            $this->expert->save();
            $message = 'Zaktualizowano zdjęcie!';
            $this->dispatchBrowserEvent('alert', ['message' => $message]);
            $this->hasPhoto=true;
            $this->file_name_new=$this->expert->photo; 
        }   
    }

    public function setPhotoName(){
        $validatedData=$this->validate([
            'file'=> 'image|max:1024',
        ]);
        $this->file_extension = $this->file->getClientOriginalExtension();
        $this->file_name=$this->expert->slug . '.' . $this->file_extension;

    }

    public function changePhotoName(){
        $validatedData=$this->validate([
            'file_name_new' => 'required|string|min:3',
        ]);
        if(Storage::disk('public')->exists('/photos/' . $this->file_name_new)){
            $this->addError('unique', 'Zdjęcie o podanej nazwie już istnieje!');
        }else {
            Storage::disk('public')->move('/photos/' . $this->expert->photo, '/photos/' . $this->file_name_new);
            $this->expert->photo=$this->file_name_new;
            $this->expert->save();
            $message = 'Zaktualizowano nazwę zdjęcia!';
            $this->dispatchBrowserEvent('alert', ['message' => $message]);
        }
    }

    public function delete(){
        $this->file = null;
        $this->expert->photo=null;
    }

    public function deletePhoto(){

        if(Storage::disk('public')->exists('/photos/' . $this->expert->photo)){
            Storage::disk('public')->delete('/photos/' . $this->expert->photo);
        }

        $this->file = null;
        $this->expert->photo=null;
        $this->file_name=null;
        $this->expert->save();
        $this->hasPhoto = false;
        $message = 'Usunięto zdjęcie!';
        $this->dispatchBrowserEvent('alert', ['message' => $message]);
    }

    public function updatePages(){

        $array = [];
        foreach($this->ePages as $index => $value){
            if($value > 0) {
                $array[$index]=$value;
            }
        }
        $this->expert->pages()->sync($array);
        $message = 'Zaktualizowano profil!';
        $this->dispatchBrowserEvent('alert', ['message' => $message]);
    }

    public function updateSchedule(){
        $validatedData=$this->validate([
            'schedule.mon' => 'string|max:40',
            'schedule.tue' => 'string|max:40',
            'schedule.wed' => 'string|max:40',
            'schedule.thu' => 'string|max:40',
            'schedule.fri' => 'string|max:40',
            'schedule.sat' => 'string|max:40',
            'schedule.info' => 'string|max:200'
        ]);

        $this->schedule->save();
        $message = 'Zaktualizowano grafik!';
        $this->dispatchBrowserEvent('alert', ['message' => $message]);
    }

    public function updateMetadata(){
        $validatedData=$this->validate([
            'page.meta_title' => 'required|string|max:255',
            'page.meta_description' => 'required|string|max:255',
        ]);

        $this->page->update();
        $message = 'Zaktualizowano profil!';
        $this->dispatchBrowserEvent('alert', ['message' => $message]);
    }

    public function render()
    {
        return view('livewire.expert-edit');
    }
}
