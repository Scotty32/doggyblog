<?php

namespace App\View\Components;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\View\Component;

class DashboardComponent extends Component
{
    public $post;
    public $admin;
    public $comments;
    public $users;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($post, $admin)
    {
        $this->post = $post;
        $this->admin = $admin;
        $this->comments = array() ;
        $this->users = User::all();
       // dd($this->users[8]->id);
        foreach ($this->admin as $admin) {
             
                //dd($admin->id);
                array_push($this->comments, $admin);    
            
            
        }
        $this->comments = Comment::where('user_id', $this->comments)->get();
        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard-component');
    }
}
