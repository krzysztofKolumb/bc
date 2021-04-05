<?php

namespace App\Http\Livewire;

use App\Models\LabTestCategory;
use App\Models\LabTestPrice;
use Livewire\Component;

class LabTests extends Component
{
    public $categories;
    public $action;
    public $selected;
    public $test;
    public $category_id='all';

    public function mount(){
        $this->categories = LabTestCategory::orderBy('name', 'asc')->get();
        $this->action = 'create';

    }

    protected $rules = [
        'test.name' => 'required|string|max:50',
        'test.load_time' => 'required|string|max:50',
        'test.regular_price' => 'required|string|max:50',
        'test.special_price' => 'required|string|max:50',
        'test.lab_test_category_id' => 'required'
    ];

    protected $messages = [
        'test.name.required' => 'To pole jest wymagane.',
        'test.name.string' => 'To pole może zawierać jedynie tekst.',
        'test.name.max' => 'To pole może zawierać maksymalnie 50 znaków.',
        'test.load_time.required' => 'To pole jest wymagane.',
        'test.load_time.string' => 'To pole może zawierać jedynie tekst.',
        'test.load_time.max' => 'To pole może zawierać maksymalnie 50 znaków.',
        'test.regular_price.required' => 'To pole jest wymagane.',
        'test.regular_price.string' => 'To pole może zawierać jedynie tekst.',
        'test.regular_price.max' => 'To pole może zawierać maksymalnie 50 znaków.',
        'test.special_price.required' => 'To pole jest wymagane.',
        'test.special_price.string' => 'To pole może zawierać jedynie tekst.',
        'test.special_price.max' => 'To pole może zawierać maksymalnie 50 znaków.',
        'test.lab_test_category_id.required' => 'To pole jest wymagane.'
    ];

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function openModal(){
        $this->test = new LabTestPrice();
        $this->action = 'create';
        $message = 'lab-test-modal';
        $this->dispatchBrowserEvent('open-modal', ['message' => $message]);
    }

    public function create(){
        $this->validate([
            'test.name' => 'required|string',
            'test.load_time' => 'required|string',
            'test.regular_price' => 'required|string',
            'test.special_price' => 'required|string',
            'test.lab_test_category_id' => 'required'
        ]);
        $this->test->save();
        // $this->tests=LabTestPrice::orderBy('name', 'asc')->get();
        $message = 'Dodano nowe badanie!';
        $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
        $this->test = new LabTestPrice();
    }

    public function selectedItem($id, $action){
        $test = LabTestPrice::find($id);
        $this->test = $test;

        if($action == 'update'){
            $this->action = 'update';
            $message = 'lab-test-modal';
            $this->dispatchBrowserEvent('open-modal', ['message' => $message]);
        }
        if($action == 'delete'){
            $message = 'delete-lab-test-modal';
            $this->dispatchBrowserEvent('open-modal', ['message' => $message]);
        }

    }

    public function update(){
        $this->validate();
        $this->test->update();
        // $this->tests = LabTestPrice::orderBy('name', 'asc')->get();
        $message = 'Zapisano zmiany!';
        $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
    }


    public function cancel(){
        $this->test->name = null;
    }

    public function delete(){
        $test = $this->test;
        $test->delete();
        // $this->tests = LabTestPrice::orderBy('name', 'asc')->get();
        $message = 'Usunięto badanie!';
        $this->dispatchBrowserEvent('close-modal', ['message' => $message]);

    }


    public function render()
    {
        if($this->category_id == 'all'){
            $tests = LabTestPrice::orderBy('name', 'asc')->get();
        }else{
            $tests = LabTestPrice::where('lab_test_category_id', $this->category_id)->get();
        }
        return view('livewire.lab-tests', compact('tests'));
    }
}
