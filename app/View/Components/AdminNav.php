<?php

namespace App\View\Components;

use App\Models\Admin;
use Illuminate\View\Component;

class AdminNav extends Component
{
    public $data;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->data = ['LoggedUserInfo'=>Admin::where('id','=', session('LoggedUser'))->first()];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        $data = ['LoggedUserInfo'=>Admin::where('id','=', session('LoggedUser'))->first()];
        return view('components.admin-nav', $data);
    }
}
