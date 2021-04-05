<?php

namespace App\View\Components;

use App\Models\Contact;
use Illuminate\View\Component;

class PageNav extends Component
{
    public $contact;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->contact = Contact::find(1);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.page-nav');
    }
}
