<?php

namespace App\Http\Livewire;

use App\Models\Article;
use App\Models\Layout;
use App\Models\Page;
use App\Models\Picture;
use Illuminate\Support\Str;
use App\Models\Section;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Pages extends Component
{
    use WithFileUploads;

    public $page_id;
    public $meta_title;
    public $meta_description;
    public $section;
    public $modal_title;
    public $editor;
    public $article;
    public $gallery;

    public $pic;

    public $article_id;
    public $article_img;

    public $file;
    public $file_name;
    public $file_extension;
    public $name;

    public $layouts;
    public $action;
    public $img;
    public $itemsNo;

    public function mount(Page $page){
        $this->page_id = $page->id;
        $this->meta_title = $page->meta_title;
        $this->meta_description = $page->meta_description;
        $this->article = new Article();
        $this->gallery = new Article();
        $this->pictures = collect();
        $this->layouts = Layout::all();
    }

    protected $rules = [
        'meta_title' => 'string',
        'meta_description' => 'string',
        'section.title' => 'string',
        'section.subtitle' => 'string',
        'section.header' => 'string',
        'section.content' => 'string',
        'article.content' => 'string',
        'article.layout_id' => 'required',
    ];

    protected $messages = [
        'section.title.string' => 'To pole może zawierać jedynie tekst.',
        'section.subtitle.string' => 'To pole może zawierać jedynie tekst.',
        'section.header.string' => 'To pole może zawierać jedynie tekst.',
        'section.content.string' => 'To pole może zawierać jedynie tekst.',

    ];

    protected $listeners = ['store', 'storeArticle', 'change'];

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function selectedItem($id, $item){

        if($item == 'section') {
            $section = Section::find($id);
            $this->section = $section;
            $this->itemsNo = $section->articles->count();
            $this->modal_title = "# Sekcja";
            $message = 'section-modal';
            $this->dispatchBrowserEvent('open-modal', ['message' => $message]);
        }elseif ($item == 'article') {
            $this->article = new Article();
            $this->section = Section::find($id);
            $message = 'article-modal';
            $this->dispatchBrowserEvent('open-modal', ['message' => $message]);
        }
        else {
            $article = Article::find($id);
            $this->article = $article;
            $section = Section::find($article->section->id);
            $this->section = $section;
            $this->modal_title = $section->title;

            $this->pictures=$article->pictures;

            if($item == 'text'){
                $message = 'article-modal';
            }
            if($item == 'gallery'){
                $this->gallery = $this->article;
                $message = 'gallery-modal';
            }
            if($item == 'layout'){
                $message = 'layout-modal';
            }
            $this->dispatchBrowserEvent('open-modal', ['message' => $message]);
        }
    }

    public function createArticle($id){
        $section = Section::find($id);
        $article = new Article();
        $article->layout_id = 1;
        $article->section_id = $section->id;
        $article->save();
        $message = 'Dodano nową część!';
        $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
    }

    public function openDeleteModal($item_id, $action, $img ){
        $this->article = Article::find($item_id);
        $this->action = $action;
        if($img) {
            $this->img = $img;
        }
        $message = 'delete-modal';
        $this->dispatchBrowserEvent('open-modal', ['message' => $message]);
    }

    public function update($item){
        $this->validate([
            'section.title' => 'string',
            'section.subtitle' => 'string',
            'section.header' => 'string',
            'section.content' => 'string',
        ]);
        if($item == 'section') {
            $this->section->update();
        }
        $message = 'Zapisano zmiany!';
        $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
    }

    public function updateLayout(){
        $this->validate([
            'article.layout_id' => 'required'
        ]);
        $this->article->update();
        $message = 'Zapisano zmiany!';
        $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
    }

    public function store($title, $subtitle, $header, $content){
        $this->section->title = $title;
        $this->section->subtitle = $subtitle;
        $this->section->header = $header;
        $this->section->content = $content;
        $this->validate();
        $this->section->update();
        $message = 'Zapisano zmiany!';
        $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
    }

    public function storeArticle($content){
        $this->article->content = $content;
        $this->validate();
        $this->article->update();
        $message = 'Zapisano zmiany!';
        $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
    }

    public function addPicture($article_id, $img){
        $this->article_id = $article_id;
        $this->article_img = $img;
        $this->file = null;
        $this->file_name = null;
        $this->name = null;
        $message = 'gallery-modal';
        $this->dispatchBrowserEvent('open-modal', ['message' => $message]);
    }

    public function change($name, $extension) {
        $this->name= $name;
        $slice = Str::beforeLast($name, '.');
        $slug = Str::slug($slice);
        $this->file_name = $slug . "." . $extension;
        $this->file_extension = $extension;
    }

    public function savePicture(){
        $this->validate([
            'file'=> 'image',
            'file_name' => 'string',
            'file_extension' => 'string',
            'name' => 'string'
        ]);
        $extension = $this->file_extension;
        $slice = Str::beforeLast($this->file_name, '.');
        $slug = Str::slug($slice);
        $file= $slug . "." . $extension;
        $article = Article::find($this->article_id);
        $img = $this->article_img;
        $article->$img = $file;

        if(Storage::disk('public')->exists('/img/' . $file)){
            $this->addError('unique', 'Obraz o podanej nazwie już istnieje!');
        }
        else {
            $this->file->storeAs('img', $file, 'public');
            $article->update();
            $this->file = null;
            $this->file_name = null;
            $message = 'Dodano zdjęcie!';
            $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
        }
    }

    public function deleteArticle(){
        $this->validate();
        $this->article->delete();
        $message = 'Usunięto część!';
        $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
    }

    public function deleteImg(){
        $img = $this->img;
        $file = $this->article->$img;
        if(Storage::disk('public')->exists('/img/' . $file)){
            Storage::disk('public')->delete('/img/' . $file);
            $this->article->$img = null;
            $this->article->update();
            $message = 'Usunięto zdjęcie!';
            $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
        }
    }

    public function updateMetadata(){
        $this->validate([
            'meta_title' => 'required|string',
            'meta_description' => 'string'
        ]);

        $page = Page::find($this->page_id);
        $page->meta_title = $this->meta_title;
        $page->meta_description = $this->meta_description;
        $page->update();
        $message = 'Zaktualizowano dane!';
        $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
    }

    public function render()
    {
        $page = Page::find($this->page_id);
        return view('livewire.pages', compact('page'));
    }
}
