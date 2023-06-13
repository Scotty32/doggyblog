<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class LikesComponent extends Component
{



    public function like(): void
    {
        $this->post->like();
    }

    public function dislike():void
    {
        $this->post->dislike();
    }
    public function render()
    {
        return view('livewire.likes-component');
    }
}
