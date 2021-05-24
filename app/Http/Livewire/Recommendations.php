<?php

namespace App\Http\Livewire;

use App\Models\Expert;
use App\Models\Recommendation;
use Livewire\Component;

class Recommendations extends Component
{

    public $recommendation;
    public $experts;
    public $action;
    public $author_id = '';
    public $recivier_id = '';

    public function mount(){
        $this->action = 'create';
        $this->experts = Expert::orderBy('lastname', 'asc')->get();
    }

    protected $rules = [
        'recommendation.content' => 'required|string',
        'recommendation.expert_id' => 'required',
        'recommendation.recommended_expert_id' => 'required'
    ];

    protected $messages = [
        'recommendation.content.required' => 'To pole jest wymagane.',
        'recommendation.content.string' => 'To pole może zawierać jedynie tekst.',
    ];

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function openModal(){
        $this->recommendation = new Recommendation();
        $this->action = 'create';
        $message = 'recommendation-modal';
        $this->dispatchBrowserEvent('open-modal', ['message' => $message]);
    }

    public function cancel(){
        // $this->recommendation->name = null;
    }

    public function create(){
        $this->validate();
        $this->recommendation->save();
        $message = 'Dodano rekomendację !';
        $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
    }

    public function selectedItem($id, $action){
        $recommendation = Recommendation::find($id);
        $this->recommendation = $recommendation;

        if($action == 'update'){
            $this->action = 'update';
            $message = 'recommendation-modal';
            $this->dispatchBrowserEvent('open-modal', ['message' => $message]);
        }
        if($action == 'delete'){
            $message = 'recommendation-delete-modal';
            $this->dispatchBrowserEvent('open-modal', ['message' => $message]);
        }

    }

    public function update(){
        $this->validate();
        $this->recommendation->update();
        $message = 'Zapisano zmiany!';
        $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
    }

    public function delete(){
        $recommendation = $this->recommendation;
        $recommendation->delete();
        $message = 'Usunięto rekomendację!';
        $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
    }

    public function render()
    {
        if($this->author_id !== '' && $this->recivier_id == '' )
        {
            $recommendations = Recommendation::where('expert_id', $this->author_id)->get();
        }
        elseif($this->author_id == '' && $this->recivier_id !== '')
        {
            $recommendations = Recommendation::where('recommended_expert_id', $this->recivier_id)->get();
        }
        elseif($this->author_id !== '' && $this->recivier_id !== '')
        {
            $recommendations = Recommendation::where('expert_id', $this->author_id)->where('recommended_expert_id', $this->recivier_id)->get();
        }        
        else{
            $recommendations = Recommendation::all();
        }
        return view('livewire.recommendations', compact('recommendations'));
    }
}
