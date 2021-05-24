<?php

namespace App\Http\Livewire;

use App\Models\ClinicalTrialCategory;
use App\Models\ClinicalTrial;
use Livewire\Component;

class ClinicalTrials extends Component
{
    public $categories;
    public $clinicalTrial;
    public $action;
    public $category_id = 'all';

    public function mount(){
        $this->categories = ClinicalTrialCategory::all();
    }

    protected $listeners = ['store'];

    protected $rules = [
        'clinicalTrial.title' => 'required|string|max:400',
        'clinicalTrial.content' => 'string',
        'clinicalTrial.clinical_trial_category_id' => 'required'

    ];

    protected $messages = [
        'clinicalTrial.title.required' => 'To pole jest wymagane.',
        'clinicalTrial.title.string' => 'To pole może zawierać jedynie tekst.',
        'clinicalTrial.title.max' => 'To pole może zawierać maksymalnie 200 znaków.',
        'clinicalTrial.clinical_trial_category_id.required' => 'To pole jest wymagane.',
        'clinicalTrial.content' => 'To pole może zawierać jedynie tekst.',
    ];

    public function openModal(){
        $this->clinicalTrial = new ClinicalTrial();
        $this->action = 'create';
        $message = 'clinical-trial-modal';
        $this->dispatchBrowserEvent('open-modal', ['message' => $message]);
    }

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function selectedItem($id, $action){
        $clinicalTrial = ClinicalTrial::find($id);
        $this->clinicalTrial = $clinicalTrial;

        if($action == 'update'){
            $this->action = 'update';
            $message = 'clinical-trial-modal';
            $this->dispatchBrowserEvent('open-modal', ['message' => $message]);
        }
        if($action == 'delete'){
            $message = 'clinical-trial-delete-modal';
            $this->dispatchBrowserEvent('open-modal', ['message' => $message]);
        }
    }

    public function store($title, $category, $content){
        $this->clinicalTrial->title = $title;
        $this->clinicalTrial->clinical_trial_category_id = $category;
        $this->clinicalTrial->content = $content;
        $this->validate();
        if($this->action == 'create'){
            $this->clinicalTrial->save();
            $message = 'Dodano badanie!';
            $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
        }
        if($this->action == 'update'){
            $this->clinicalTrial->update();
            $message = 'Zapisano zmiany!';
            $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
        }
    }

    public function delete(){
        if($this->clinicalTrial){
            $this->clinicalTrial->delete();
            $message = 'Usunięto badanie!';
            $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
        }
    }


    public function render()
    {
        if($this->category_id == 'all'){
            $clinicalTrials = ClinicalTrial::orderBy('title', 'asc')->get();
        }else{
            $clinicalTrials = ClinicalTrial::where('clinical_trial_category_id', $this->category_id)->get();
        }
        return view('livewire.clinical-trials', compact('clinicalTrials'));
    }

    // public function render()
    // {
    //     $clinicalTrials = ClinicalTrial::all();

    //     return view('livewire.clinical-trials', compact('clinicalTrials'));
    // }
}
