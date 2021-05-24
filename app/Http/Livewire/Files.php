<?php

namespace App\Http\Livewire;

use App\Models\File;
use App\Models\FileCategory;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;


class Files extends Component
{
    use WithFileUploads;

    public $categories;
    public $action;
    public $file;
    public $newFile;
    public $selectedFile;
    public $category_id='all';
    public $name;

    public function mount() {
        $this->categories = FileCategory::orderBy('name', 'asc')->get();
        $this->action = 'create';
    }

    protected $rules = [
        'file.title' => 'required|string',
        'file.file_category_id' => 'required',
        'file.slug' => 'string',
        'file.type' => 'string',
        // 'newFile'=> 'file',
        // 'newFile'=> 'file|mimes:pdf,doc,docx',

    ];

    protected $messages = [
        'file.title.required' => 'To pole jest wymagane.',
        'file.title.string' => 'To pole może zawierać jedynie tekst.',
        'file.file_category_id.required' => 'To pole jest wymagane.',
        // 'newFile.file' => 'Wybierz plik pdf, doc lub docx'
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

        // $replaced = Str::replaceLast('the', 'a', 'the quick brown fox jumps over the lazy dog');

        $this->file->slug = $slug . "." . $extension;
        $this->file->title = $name;
        $this->file->type = $extension;
        // dd($this->file->slug);
        // $this->file->title = $slug . "." . $extension;
        // $extension = $this->newFile->extension();
        // dd($extension);
    }

    public function openModal(){
        $this->name = "";
        $this->file = new File();
        $this->action = 'create';
        $message = 'file-modal';
        $this->dispatchBrowserEvent('open-modal', ['message' => $message]);
    }

    public function create(){
        $this->validate();
        $extension = $this->newFile->extension();
        $slug = Str::slug($this->file->title);
        $this->file->slug = $slug . "." . $extension;
        $this->file->type = $extension;

        if(Storage::disk('public')->exists('/files/' . $this->file->title)){
            $this->addError('unique', 'Dokument o podanej nazwie już istnieje!');
        }
        else {
            $this->newFile->storeAs('files', $this->file->title, 'public');
            $this->file->save();
            $message = 'Dodano dokument!';
            $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
        }
    }

    // public function setnewFileName(){
    //     $this->newFile->getClientOriginalExtension();
    //     $tmpFile = Storage::get('/livewire-tmp/'.$this->newFile);
    //     dd($this->newFile->getClientOriginalExtension());
    //     Storage::put('/avatars/'.request('newFile'), $tmpFile);
    //     Storage::delete('/tmp/'.request('newFile'));
    //     $this->file->title = $tmpFile->getClientOriginalName();
    
    // $this->name=$this->newFile->extension();
    // }

    public function selectedItem($id, $action){
        $file = File::find($id);
        $this->file = $file;

        if($action == 'update'){
            $this->action = 'update';
            $this->selectedFile = $file;
            $message = 'file-modal';
            $this->dispatchBrowserEvent('open-modal', ['message' => $message]);
        }
        if($action == 'delete'){
            $message = 'file-delete-modal';
            $this->dispatchBrowserEvent('open-modal', ['message' => $message]);
        }

    }

    public function update(){
        $this->validate();
        $slice = Str::beforeLast($this->file->title, '.');
        $slug = Str::slug($slice);
        $this->file->slug = $slug . "." . $this->file->type;

        if($this->selectedFile->title !== $this->file->title){

            if(Storage::disk('public')->exists('/files/' . $this->file->title)){
                $this->addError('uniqueName', 'Dokument o podanej nazwie już istnieje!');
            }
            else {
                Storage::disk('public')->move('/files/' . $this->selectedFile->title, '/files/' . $this->file->title);
                $this->file->update();
                $message = 'Zapisano zmiany!';
                $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
            }
        }else{
            
            $this->file->update();
            $message = 'Zapisano zmiany!';
            $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
        }

        // if(Storage::disk('public')->exists('/files/' . $this->file->title)){
        //     $this->addError('uniqueName', 'Dokument o podanej nazwie już istnieje!');
        // }
        // else {
        //     $slice = Str::beforeLast($this->file->title, '.');
        //     $slug = Str::slug($slice);
        //     $this->file->slug = $slug . "." . $this->file->type;
        //     Storage::disk('public')->move('/files/' . $this->selectedFile->title, '/files/' . $this->file->title);
        //     $this->file->update();
        //     $message = 'Zapisano zmiany!';
        //     $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
        // }
        
    }

    public function delete(){
        $file = $this->file;
        if(Storage::disk('public')->exists('/files/' . $this->file->title)){
            Storage::disk('public')->delete('/files/' . $this->file->title);
            $file->delete();
            $message = 'Usunięto dokument!';
            $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
        }
    }

    public function render()
    {
        if($this->category_id == 'all'){
            $files = File::orderBy('title', 'asc')->get();
        }else{
            $files = File::where('file_category_id', $this->category_id)->orderBy('title', 'asc')->get();
        }
        return view('livewire.files', compact('files'));
    }
}
