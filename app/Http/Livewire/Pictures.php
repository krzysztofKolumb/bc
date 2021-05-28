<?php

namespace App\Http\Livewire;

use App\Models\Picture;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class Pictures extends Component
{
    use WithFileUploads;

    public $picture;
    public $page_id='10';
    public $action;
    public $canDelete = false;

    public $file;
    public $file_name;
    public $file_extension;
    public $name;
    public $name_new;

    public function mount(){
        $this->action = 'create';
    }

    protected $rules = [
        'file'=> 'required|image',
        'file_name' => 'required',
        'file_extension' => 'string',
        'name' => 'string',
        'picture.page_id' => 'required',
        'name_new'=> 'required',
    ];

    protected $messages = [
        'picture.page_id.required' => 'Zaznacz galerię',
        'file.image' => 'Wybierz zdjęcie',
        'file.required' => 'Wybierz zdjęcie',
        'file_name.required' => 'Wpisz nazwę pliku',
        'name_new.required' => 'To pole jest wymagane.',
    ];

    protected $listeners = ['change'];

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function change($name, $extension) {
        $this->name= $name;
        $slice = Str::beforeLast($name, '.');
        $slug = Str::slug($slice);
        $this->file_name = $slug . "." . $extension;
        $this->file_extension = $extension;
    }

    public function openModal(){
        $this->picture = new Picture();
        $this->action = 'create';
        $this->file = null;
        $this->file_name = null;
        $this->name = null;
        $message = 'picture-modal';
        $this->dispatchBrowserEvent('open-modal', ['message' => $message]);
    }

    public function selectedItem($id, $action){
        $picture = Picture::find($id);
        $this->picture = $picture;

        if($action == 'update'){
            $this->action = 'update';
            $this->name_new = $picture->name;
            $message = 'picture-update-modal';
            $this->dispatchBrowserEvent('open-modal', ['message' => $message]);
        }
        if($action == 'delete'){
            $message = 'delete-modal';
            $this->dispatchBrowserEvent('open-modal', ['message' => $message]);
        }

    }

    public function create(){
        $this->validate([
            'file'=> 'required|image',
            'file_name' => 'required',
            'file_extension' => 'string',
            'name' => 'string',
            'picture.page_id' => 'required'
        ]);
        $extension = $this->file_extension;
        $slice = Str::beforeLast($this->file_name, '.');
        $slug = Str::slug($slice);
        $file= $slug . "." . $extension;

        if(Storage::disk('public')->exists('/img/' . $file)){
            $this->addError('unique', 'Obraz o podanej nazwie już istnieje!');
        }
        else {
            $this->file->storeAs('img', $file, 'public');
            $picture = $this->picture;
            $picture->name = $file;
            $picture->save();
            $message = 'Dodano zdjęcie!';
            $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
        }
    }

    public function update(){
        $this->validate([
            'name_new' => 'required',
        ]);
        $extension = Str::afterLast($this->picture->name, '.');
        $slice = Str::beforeLast($this->name_new, '.');
        $slug = Str::slug($slice);
        $file= $slug . "." . $extension;
        if(Storage::disk('public')->exists('/img/' . $file)){
            $this->addError('unique', 'Obraz o podanej nazwie już istnieje!');
        }else {
            Storage::disk('public')->move('/img/' . $this->picture->name, '/img/' . $file);
            $this->picture->name = $file;
            $this->picture->update();
            $message = 'Zapisano zmiany!';
            $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
        }
    }

    public function delete(){
        $picture = $this->picture;
        if(Storage::disk('public')->exists('/img/' . $picture->name)){
            Storage::disk('public')->delete('/img/' . $picture->name);
            $picture->delete();
            $message = 'Usunięto obraz!';
            $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
        }
    }

    public function render()
    {
        if($this->page_id == 'all'){
            $pictures = Picture::all();
        }else{
            $pictures = Picture::where('page_id', $this->page_id)->get();
        }
        return view('livewire.pictures', compact('pictures'));
    }
}
