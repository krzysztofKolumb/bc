<?php

namespace App\Http\Livewire;

use App\Models\ClinicalTrialCategory;
use App\Models\ClinicalTrial;
use Livewire\Component;

class ClinicalTrials extends Component
{
    public $categories;
    public $clinicalTrials;
    public $clinicalTrial;
    public $selectedItem;

    public $mamo;

    public function mount(){
        $this->categories = ClinicalTrialCategory::all();
        $this->clinicalTrials = ClinicalTrial::all();

        $this->clinicalTrial = new ClinicalTrial();
    }

    protected $listeners = ['store', 'update'];

    protected $rules = [
        'clinicalTrial.title' => 'required|string|max:200',
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

    public function store($title, $category, $content){
        $this->clinicalTrial->title = $title;
        $this->clinicalTrial->category = $category;
        $this->clinicalTrial->content = $content;

    }

    public function selectedItem($id, $action){
        $clinicalTrial = ClinicalTrial::find($id);
        $this->selectedItem = $clinicalTrial;

        if($action == 'update'){
            $this->dispatchBrowserEvent('open-edit-specialty-modal');
        }
        if($action == 'delete'){
            $message = 'delete-clinical-trial-modal';
            $this->dispatchBrowserEvent('open-delete-modal', ['message' => $message]);
        }

    }

    public function update(){
        $this->clinicalTrials= ClinicalTrial::all();
    }

    public function delete(){
        if($this->selectedItem){
            $toDelete = ClinicalTrial::find($this->selectedItem->id);
            $toDelete->delete();
            $this->clinicalTrials= ClinicalTrial::all();
            $this->selectedItem = null;
            $message = 'Usunięto badanie!';
            $this->dispatchBrowserEvent('close-delete-modal', ['message' => $message]);
        }
    }

    public function render()
    {
        return view('livewire.clinical-trials');
    }
}
