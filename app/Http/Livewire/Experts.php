<?php

namespace App\Http\Livewire;

use App\Models\Expert;
use App\Models\Page;
use App\Models\Profession;
use App\Models\Schedule;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Experts extends Component
{
    public $professions;
    public $selected;
    public $profession_id='all';

    public function mount() {
        $this->professions = Profession::where('type', 1)->get();
    }

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function selectedItem($id, $action){

        $this->selected = Expert::find($id);

        if($action == 'delete'){
            $message = 'expert-delete-modal';
            $this->dispatchBrowserEvent('open-modal', ['message' => $message]);
        }
    }

    public function delete(){
        $expert = $this->selected;
        $page = Page::find($expert->page_id);
        if($page){
            $page->delete();
        }
        $expert->pages()->detach();
        $expert->specialties()->detach();
        $schedule = Schedule::find($expert->schedule_id);
        if($schedule){
            $schedule->delete();
        }
        if(Storage::disk('public')->exists('/photos/' . $expert->photo)){
            Storage::disk('public')->delete('/photos/' . $expert->photo);
        }
        $expert->delete();

        $message = 'Usunięto eksperta!';
        $this->dispatchBrowserEvent('close-modal', ['message' => $message]);
    }

    public function render()
    {
        if($this->profession_id == 'all'){
            $experts = Expert::orderBy('lastname', 'asc')->get();
        }else{
            $experts = Expert::where('profession_id', $this->profession_id)->orderBy('lastname', 'asc')->get();
        }
        return view('livewire.experts', compact('experts'));
    }
}
