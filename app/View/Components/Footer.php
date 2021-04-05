<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Contact;

class Footer extends Component
{
    public $footer;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $footer = Contact::find(1);
        $this->footer = $footer;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.footer');
    }
}
