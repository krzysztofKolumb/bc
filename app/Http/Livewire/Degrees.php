<?php

namespace App\Http\Livewire;

use App\Models\Degree;
use Livewire\Component;
use Illuminate\Support\Str;

class Degrees extends Component
{
    public $degrees;
    public $current;
    public $degree;
    public $canDelete = false;

    public function mount(){
        $this->degrees = Degree::orderBy('name', 'asc')->get();
        $this->degree = new Degree();
    }

    protected $rules = [
        'degree.name' => 'required|string|max:30',
        'current.name' => 'required|string|max:30',
    ];

    protected $messages = [
        'degree.name.required' => 'To pole jest wymagane.',
        'degree.name.string' => 'To pole może zawierać jedynie tekst.',
        'degree.name.max' => 'To pole może zawierać maksymalnie 30 znaków.',
        'current.name.required' => 'To pole jest wymagane.',
        'current.name.string' => 'To pole może zawierać jedynie tekst.',
        'current.name.max' => 'To pole może zawierać maksymalnie 30 znaków.',
    ];

    public function create(){
        $this->validate([
            'degree.name' => 'required|string|max:30',
        ]);
        $name = $this->degree->name;
        $ex = Degree::where('name', $name)->count();
        if($ex > 0){
            $this->addError('unique', 'Stopień | Tytuł już istnieje!');
        }else {   
            $this->degree->save();
            // $this->degrees->add($this->degree);
            $this->degrees=Degree::orderBy('name', 'asc')->get();
            $message = 'Dodano nowy tytuł | stopień: ' . $this->degree->name . '!';
            $this->dispatchBrowserEvent('close-new-degree-modal', ['message' => $message]);
            $this->degree = new Degree();
        } 
    }

    public function selectedItem($id, $action){
        $degree = Degree::find($id);
        $this->current = $degree;

        if($action == 'update'){
            $this->dispatchBrowserEvent('open-edit-degree-modal');
        }
        if($action == 'delete'){
            if($degree->experts->count() < 1){
                $this->canDelete=true;
            }else{
                $this->canDelete=false;
            }
            $this->dispatchBrowserEvent('open-delete-degree-modal');
        }
    }

    public function update(){
        $this->validate([
            'current.name' => 'required|string|max:30',
        ]);
        $this->current->save();
        $this->degrees = Degree::orderBy('name', 'asc')->get();
        $message = 'Zapisano zmiany!';
        $this->dispatchBrowserEvent('close-edit-degree-modal', ['message' => $message]);

    }

    public function delete(){
        $degree = $this->current;
        $degree->delete();
        $this->degrees = Degree::orderBy('name', 'asc')->get();
        $message = 'Usunięto stopień | tytuł!';
        $this->dispatchBrowserEvent('close-delete-degree-modal', ['message' => $message]);

    }

    public function cancel(){
        $this->degree->name = null;
    }

    public function render()
    {
        return view('livewire.degrees');
    }
}
