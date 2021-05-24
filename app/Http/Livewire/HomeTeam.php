<?php

namespace App\Http\Livewire;

use App\Models\Expert;
use App\Models\Page;
use Livewire\Component;

class HomeTeam extends Component
{
    public $experts;
    public $allExperts;
    public $home;
    public $chunksCount;
    public $index=1;

    public function mount(Page $home)
    {
        $this->home = $home;
        // $experts = Expert::whereNotNull('photo')->inRandomOrder()->get();
        $experts = $home->homeExperts;
        $this->allExperts = $experts;
        $chunks = $experts->chunk(4);
        $this->experts = $chunks[0];

        if($experts->count() % 4 == 0) {
            $this->chunksCount = $chunks->count();
        }else {
            $this->chunksCount = $chunks->count() - 1;
        }
    }

    protected $listeners = ['update'];

    
    public function update(){
        $chunks = $this->allExperts->chunk(4);
        
        if($this->index < $this->chunksCount){
            $this->experts = $chunks[$this->index];
            $this->index++;
        }else {
            $this->experts = $chunks[0];
            $this->index = 1;
        }

    }

    public function render()
    {
        // $experts1 = Expert::whereNotNull('photo')->inRandomOrder()->limit(4)->get();

        // $experts1 = Expert::whereNotNull('photo')->inRandomOrder()->get();
        // $chunks = $experts1->chunk(4);
        // $experts = $chunks[0];

        // return view('livewire.home-team', compact('experts'));
        return view('livewire.home-team');

    }
}
