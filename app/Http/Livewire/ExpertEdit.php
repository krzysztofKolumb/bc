<?php

namespace App\Http\Livewire;

use App\Models\Degree;
use App\Models\Expert;
use App\Models\Page;
use App\Models\Profession;
use App\Models\Specialty;
use Illuminate\Support\Arr;
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
    // public $disabled;
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
    public $expert_id;
    public $photo_default_name="";
    public $selectedItem;
    public $content;

    public function mount(Expert $expert)
    {
        $this->expert = $expert;
        $this->expert_id = $expert->id;

        $this->degrees=Degree::all();
        $this->specialties = Specialty::orderBy('name', 'asc')->get();
        $this->professions = Profession::where('type', 1)->get();
        if($expert->photo == null){$this->hasPhoto=false;}else {$this->hasPhoto=true;}
        $this->photo_default_name = Str::slug($this->expert->firstname . " " . $this->expert->lastname . " " . $this->expert->profession->name);

        $this->schedule=$expert->schedule;
        $this->file_name_new = $expert->photo;

        $this->specs=[];
        $specs=$expert->specialties()->allRelatedIds();
        foreach($specs as $spec){
            $this->specs[$spec]=$spec;
        }
        $this->pages = Page::take(7)->get();
        // $this->disabled = '';
        // if(Page::find(1)->experts()->count() >= 5){
        //     $this->disabled='disabled';
        // }
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

    protected $listeners = ['change', 'refresh', 'updateContent'];

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function setFileNameNew()
    {
        if(!$this->file_name_new){
            $this->file_name_new = $this->expert->photo;
        }
    }

    public function updatedFile()
    {
        $this->photo_default_name = Str::slug($this->expert->firstname . " " . $this->expert->lastname . " " . $this->expert->profession->name);
        if($this->file){
            $this->photo_extension = $this->file->extension();
            $this->photo_default_name =  $this->photo_default_name .  "." . $this->photo_extension;
        }
    }

    public function refresh(){
        $this->expert = Expert::find($this->expert_id);
    }

    public function updateBasicInfo(){
        $validatedData=$this->validate([
            'expert.firstname' => 'required|string|min:3',
            'expert.lastname' => 'required|string|max:20',
            'expert.degree_id' => 'required',
            'expert.profession_id' => 'required'
        ]);


        $firstname = $this->expert->firstname;
        $lastname = $this->expert->lastname;
        $degree_id = $this->expert->degree_id;

        $page = $this->expert->page;
        $page->slug=Str::slug($firstname . " " . $lastname);
        $page->title= Degree::find($degree_id)->name . " " . $firstname . " " . $lastname;
        $page->meta_title= Degree::find($degree_id)->name . " " . $firstname . " " . $lastname . " | BodyClinic";
        $page->save();

        $this->expert->slug = Str::slug($this->expert->firstname . " " . $this->expert->lastname);
        $this->expert->save();

        if($this->changed === true){
            return redirect('admin/experts/' . $this->expert->slug);
        }
        $this->emitSelf('refresh');
        $message = 'Zapisano zmiany!';
        $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
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
        $this->emitSelf('refresh');
        $message = 'Zapisano zmiany!';
        $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
    }

    public function savePhoto(){
        $validatedData=$this->validate([
            'file'=> 'required|image|max:1024',
        ]);
        if(Storage::disk('public')->exists('/photos/' . $this->photo_default_name)){
            $this->addError('unique', 'Zdjęcie o podanej nazwie już istnieje!');
        }else {
            $this->file->storeAs('photos', $this->photo_default_name, 'public');
            $this->expert->photo = $this->photo_default_name;
            $this->expert->save();
            $this->emitSelf('refresh');
            $message = 'Zapisano zdjęcie!';
            $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
            $this->hasPhoto=true;
            $this->file_name_new=$this->expert->photo;
        }   
    }

    // public function setPhotoName(){
    //     $validatedData=$this->validate([
    //         'file'=> 'image|max:1024',
    //     ]);
    //     $this->file_extension = $this->file->getClientOriginalExtension();
    //     $this->file_name=$this->expert->slug . '.' . $this->file_extension;

    // }

    public function updatePhotoName(){
        $validatedData=$this->validate([
            'file_name_new' => 'required|string|min:3',
        ]);
        if(Storage::disk('public')->exists('/photos/' . $this->file_name_new)){
            $this->addError('unique', 'Zdjęcie o podanej nazwie już istnieje!');
        }else {
            Storage::disk('public')->move('/photos/' . $this->expert->photo, '/photos/' . $this->file_name_new);
            $this->expert->photo=$this->file_name_new;
            $this->expert->save();
            $this->emitSelf('refresh');
            $message = 'Zapisano zmiany!';
            $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
        }
    }

    public function deletePrevPhoto(){
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
        $this->emitSelf('refresh');
        $message = 'Usunięto zdjęcie!';
        $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
    }

    public function updatePages(){

        $array = [];
        foreach($this->ePages as $index => $value){
            if($value > 0) {
                $array[$index]=$value;
            }
        }
        $this->expert->pages()->sync($array);
        $this->emitSelf('refresh');
        $message = 'Zapisano zmiany!';
        $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
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
        $this->emitSelf('refresh');
        $message = 'Zapisano zmiany!';
        $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
    }

    public function updateMetadata(){
        $validatedData=$this->validate([
            'page.meta_title' => 'required|string|max:255',
            'page.meta_description' => 'required|string|max:255',
        ]);

        $this->page->update();
        $this->emitSelf('refresh');
        $message = 'Zapisano zmiany!';
        $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
    }

    public function selectedItem($item, $modalTitle){
        $this->selectedItem = $item;
        $this->content = $this->expert->$item;

        $titles = ['1' => 'Konsultacje',
                  '2' => 'Informacje Ogólne',
                  '3' => 'Wykształcenie',
                  '4' => 'Doświadczenie',
                  '5' => 'Certyfikaty',
                  '6' => 'Nagrody i Wyróżnienia',
                  '7' => 'Leczone Choroby',
                  '8' => 'Linki Zewnętrzne'
                ];
        $message = 'editor-modal';
        $title = Arr::get($titles, $modalTitle);
        $this->dispatchBrowserEvent('open-modal', ['message' => $message, 'title' => $title]);
    }

    public function updateContent($content){
        // $this->validate([
        //     'content' => 'string',
        // ]);
        $field = $this->selectedItem;
        $this->expert->$field = $content;
        $this->expert->update();
        $message = 'Zapisano zmiany!';
        $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
    }




    public function render()
    {
        // $expert = Expert::find($this->expert_id);

        return view('livewire.expert-edit');
    }
}