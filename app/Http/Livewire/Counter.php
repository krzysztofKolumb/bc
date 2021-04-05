<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Employee;

class Counter extends Component
{

    // public $count = 0;

    // public function increment()
    // {
    //     $this->count++;
    // }

    // public function render()
    // {
    //     return view('livewire.counter');
    // }

    public $search = '';

    public function render()
    {
        return view('livewire.search-users', [
            'employees' => Employee::where('lastname', $this->search)->get(),
        ]);
    }



    // public function render()
    // {
    //     return view('livewire.counter');
    // }
}
