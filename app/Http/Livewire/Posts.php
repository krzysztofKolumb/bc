<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class Posts extends Component
{
    public $selectedItem;

    protected $listeners = ['updateList'];

    public function updateList(){
        // $this->posts = Post::all();
    }

    public function openDeleteModal($id){
        $selectedPost = Post::find($id);
        $this->selectedItem = $selectedPost;

        $message = 'delete-post-modal';
        $this->dispatchBrowserEvent('open-modal', ['message' => $message]);

    }

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function delete(){
        if($this->selectedItem){
            $toDelete = Post::find($this->selectedItem->id);
            $toDelete->delete();
            $this->selectedItem = null;
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
