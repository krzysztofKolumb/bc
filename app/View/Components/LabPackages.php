<?php

namespace App\View\Components;

use App\Models\LabPackage;
use App\Models\Section;
use Illuminate\View\Component;

class LabPackages extends Component
{
    public $section;
    public $packages;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->section = Section::find(29);
        $this->packages = LabPackage::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.lab-packages');
    }
}
