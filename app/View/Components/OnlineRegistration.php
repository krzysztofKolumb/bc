<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Contact;
use App\Models\Section;

class OnlineRegistration extends Component
{
    public $section;
    public $contact;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->section = Section::find(18);
        $this->contact = Contact::find(1);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.online-registration');
    }
}
