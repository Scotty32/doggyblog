<?php

namespace App\View\Components;

use App\Models\User;
use Illuminate\View\Component;

class suscribersComponent extends Component
{
    public $suscribers;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->suscribers = User::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.suscribers-component');
    }
}
