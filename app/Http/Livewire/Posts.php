<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Str;

class Posts extends Component
{
    public $post;
    public $action;

    public function mount(){
        $this->action = 'create';
    }

    protected $listeners = ['store'];

    protected $rules = [
        'post.title' => 'required|string|max:400',
        'post.content' => 'string',
    ];

    protected $messages = [
        'post.title.required' => 'To pole jest wymagane.',
        'post.title.string' => 'To pole może zawierać jedynie tekst.',
        'post.title.max' => 'To pole może zawierać maksymalnie 200 znaków.',
        'post.content' => 'To pole może zawierać jedynie tekst.',
    ];

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function openModal(){
        $this->post = new Post();
        $this->action = 'create';
        $message = 'post-modal';
        $this->dispatchBrowserEvent('open-modal', ['message' => $message]);
    }

    public function selectedItem($id, $action){
        $post = Post::find($id);
        $this->post = $post;

        if($action == 'update'){
            $this->action = 'update';
            $message = 'post-modal';
            $this->dispatchBrowserEvent('open-modal', ['message' => $message]);
        }
        if($action == 'delete'){
            $message = 'post-delete-modal';
            $this->dispatchBrowserEvent('open-modal', ['message' => $message]);
        }
    }

    public function store($title, $content){
        $this->post->title = $title;
        $this->post->content = $content;
        $this->post->slug = Str::slug($this->post->title);
        $this->validate();
        if($this->action == 'create'){
            $this->post->save();
            $message = 'Dodano post!';
            $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
        }
        if($this->action == 'update'){
            $this->post->update();
            $message = 'Zapisano zmiany!';
            $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
        }
    }

    public function delete(){
        if($this->post){
            $this->post->delete();
            $message = 'Usunięto post!';
            $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
        }
    }

    public function render()
    {
        $posts = Post::latest()->paginate(20);
        return view('livewire.posts', compact('posts'));
    }
}
