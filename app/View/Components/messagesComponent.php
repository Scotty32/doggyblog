<?php

namespace App\View\Components;

use App\Models\MessageAdmin;
use Illuminate\View\Component;

class messagesComponent extends Component
{
    public $messages;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->messages = MessageAdmin::orderBy('created_at', 'desc');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.messages-component');
    }
}
