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
    public $selected;
    public $file;
    public $document;
    public $tmpFile;

    public $category_id='all';

    public function mount() {
        $this->categories = FileCategory::orderBy('name', 'asc')->get();
        $this->action = 'create';

    }

    protected $rules = [
        'file.title' => 'required|string',
        'file.file_category_id' => 'required',
        'document'=> 'file|mimes:pdf,doc,docx',
    ];

    protected $messages = [
        'file.title.required' => 'To pole jest wymagane.',
        'file.title.string' => 'To pole może zawierać jedynie tekst.',
        'file.file_category_id.required' => 'To pole jest wymagane.'
    ];

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function openModal(){
        // $this->file = new File();
        $this->action = 'create';
        $message = 'file-modal';
        $this->dispatchBrowserEvent('open-modal', ['message' => $message]);
    }

    public function create(){
        $this->validate();
        $slug = Str::slug($this->file->title);
        $this->file->slug = $slug;
        $this->file->save();
        $message = 'Dodano dokument!';
        $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
        $this->file = new File();
    }

    // public function setDocumentName(){
        // $this->document->getClientOriginalExtension();
        // $tmpFile = Storage::get('/livewire-tmp/'.$this->document);
        // dd($this->document->getClientOriginalExtension());
        // Storage::put('/avatars/'.request('document'), $tmpFile);
        // Storage::delete('/tmp/'.request('document'));
        // $this->file->title = $tmpFile->getClientOriginalName();
    // }

    public function selectedItem($id, $action){
        // $file = File::find($id);
        // $this->file = $file;

        if($action == 'update'){
            $this->action = 'update';
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
        $slug = Str::slug($this->file->title);
        $this->file->slug = $slug;
        $this->file->update();
        $message = 'Zapisano zmiany!';
        $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
    }

    public function delete(){
        $file = $this->file;
        $file->delete();
        $message = 'Usunięto dokument!';
        $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
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
