<?php

namespace App\View\Components;

use App\Models\File;
use App\Models\LabPackage;
use App\Models\LabTestCategory;
use App\Models\Section;
use Illuminate\View\Component;

class LabTests extends Component
{

    public $section;
    public $categories;
    public $file;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->section = Section::find(28);
        $this->categories = LabTestCategory::orderBy('name', 'asc')->get();
        $this->file = File::find(8);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.lab-tests');
    }
}
