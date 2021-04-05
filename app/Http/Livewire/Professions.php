<?php

namespace App\Http\Livewire;

use App\Models\Profession;
use Illuminate\Support\Collection;
use Livewire\Component;

class Professions extends Component
{
    public Collection $professions;
    public $current;
    public $profession;
    public $canDelete = false;
    public $ix = 9999;

    public function mount(){
        $this->professions = Profession::orderBy('name', 'asc')->get();
        $this->profession = new Profession();
    }

    protected $rules = [
        'profession.name' => 'required|string|max:30',
        'profession.team' => 'required|string|max:30',
        'profession.type' => 'required',
        'professions.*.name' => 'required|string|max:30',
        'professions.*.team' => 'required|string|max:30',
        'professions.*.type' => 'required',
        'current.name' => 'required|string|max:30',
        'current.team' => 'required|string|max:30',
        'current.type' => 'required',

    ];

    protected $messages = [
        'profession.name.required' => 'To pole jest wymagane.',
        'profession.name.string' => 'To pole może zawierać jedynie tekst.',
        'profession.name.max' => 'To pole może zawierać maksymalnie 30 znaków.',
        'profession.team.required' => 'To pole jest wymagane.',
        'profession.team.string' => 'To pole może zawierać jedynie tekst.',
        'profession.team.max' => 'To pole może zawierać maksymalnie 30 znaków.',
        'profession.type.required' => 'To pole jest wymagane.',
        'current.name.required' => 'To pole jest wymagane.',
        'current.name.string' => 'To pole może zawierać jedynie tekst.',
        'current.name.max' => 'To pole może zawierać maksymalnie 30 znaków.',
        'current.team.required' => 'To pole jest wymagane.',
        'current.team.string' => 'To pole może zawierać jedynie tekst.',
        'current.team.max' => 'To pole może zawierać maksymalnie 30 znaków.',
        'current.type.required' => 'To pole jest wymagane.',
        'professions.*.name.required' => 'To pole jest wymagane.',
        'professions.*.name.string' => 'To pole może zawierać jedynie tekst.',
        'professions.*.name.max' => 'To pole może zawierać maksymalnie 30 znaków.',
        'professions.*.team.required' => 'To pole jest wymagane.',
        'professions.*.team.string' => 'To pole może zawierać jedynie tekst.',
        'professions.*.team.max' => 'To pole może zawierać maksymalnie 30 znaków.',
        'professions.*.type.required' => 'To pole jest wymagane.',
    ];

    public function create(){
        $this->validate([
            'profession.name' => 'required|string|max:30',
            'profession.team' => 'required|string|max:30',
            'profession.type' => 'required',
        ]);
        $name = $this->profession->name;
        $ex = Profession::where('name', $name)->count();
        if($ex > 0){
            $this->addError('unique', 'Zawód już istnieje!');
        }else{
        $this->profession->save();
        $this->professions = Profession::orderBy('name', 'asc')->get();
        $message = 'Dodano zawód: ' . $this->profession->name . '!';
        $this->dispatchBrowserEvent('close-new-profession-modal', ['message' => $message]);
        $this->profession = new Profession();
        }    
    }

    public function selectedItem($id, $action, $index){
        $profession = Profession::find($id);
        $this->current = $profession;
        $this->ix = $index;

        if($action == 'update'){
            $this->dispatchBrowserEvent('open-edit-profession-modal');
        }
        if($action == 'delete'){
            if($profession->experts->count() < 1){
                $this->canDelete=true;
            }else{
                $this->canDelete=false;
            }
            $this->dispatchBrowserEvent('open-delete-profession-modal');
        }

    }

    public function cancel(){
        $this->profession->name = null;
        $this->profession->team = null;
        $this->profession->type = null;
    }

    public function delete(){
        $profession = $this->current;
        $profession->delete();
        $this->professions->forget([$this->ix]);
        $message = 'Usunięto zawód!';
        $this->dispatchBrowserEvent('close-delete-profession-modal', ['message' => $message]);

    }

    public function update(){
        $this->validate([
            'current.name' => 'required|string|max:30',
            'current.team' => 'required|string|max:30',
            'current.type' => 'required',
        ]);
        $this->current->update();
        $this->professions[$this->ix] = $this->current;
        $message = 'Zapisano zmiany!';
        $this->dispatchBrowserEvent('close-edit-profession-modal', ['message' => $message]);

    }

    public function updateNew(){
        $this->validate([
            'profession.name' => 'required|string|max:30',
            'profession.team' => 'required|string|max:30',
            'profession.type' => 'required',
        ]);
        $this->professions[$this->ix]->update();
        $message = 'Zapisano zmiany!';
        $this->dispatchBrowserEvent('close-edit-profession-modal', ['message' => $message]);

    }


    public function render()
    {
        return view('livewire.professions');
    }
}
