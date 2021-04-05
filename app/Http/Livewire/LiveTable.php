<?php

namespace App\Http\Livewire;

use App\Models\Expert;
use Livewire\Component;

class LiveTable extends Component
{

    public $expert_id='';

    protected $listeners = ['delete'];

    public function addNew($id){
        $this->expert_id=$id;
        // dd($this->expert_id . ' | ' . $id);
        $this->dispatchBrowserEvent('show-form');
    }

    public function delete()
    {
        // dd($this->expert_id);
        // Expert::find($id)->delete();

        $this->dispatchBrowserEvent('hide-form'); // add this

        // $this->dispatchBrowserEvent('hide-form', ['user_name' => 'boze drogi']); // add this

    }

    public function render()
    {
        $experts = Expert::all();
        return view('livewire.live-table', compact('experts'));

    }
}
