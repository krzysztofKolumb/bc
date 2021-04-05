<?php

namespace App\Http\Livewire;

use App\Models\Consultation;
use App\Models\Expert;
use Livewire\Component;

class ExpertPriceList extends Component
{
    public $expert;
    public $consultations;

    public function mount($expert){
        $this->expert = $expert;
        $this->action = 'create';
        $this->consultations = Consultation::where('expert_id', $this->expert->id)->get();


    }

    protected $rules = [
        'consultations.*.name' => 'required|string',
        'consultations.*.first_duration' => 'required|string',
        'consultations.*.duration' => 'required|string',
        'consultations.*.first_price' => 'required|string',
        'consultations.*.price' => 'required|string',

    ];

    protected $messages = [
        'consultation.name.required' => 'To pole jest wymagane.',
        'consultation.name.string' => 'To pole może zawierać jedynie tekst.',
        'consultation.name.max' => 'To pole może zawierać maksymalnie 50 znaków.',
    ];

    public function render()
    {
        $consultations = Consultation::where('expert_id', $this->expert->id)->get();


        return view('livewire.expert-price-list', compact('consultations'));
    }
}
