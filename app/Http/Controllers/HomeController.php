<?php

namespace App\Http\Controllers;
use App\Services\Post\PostService;
use Inertia\Inertia;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    private PostService $postService;

    public function __construct(PostService $postService)
    {
        $this->postService= $postService;
    }

    public function index()
    {
        $best_post = $this->postService->getBestPosts();
        $posts = $this->postService
            ->getAllPosts();

        return Inertia::render(
            'Home',
            [
                'bests' => $best_post,
                'posts' => $posts
            ]
        );


    }
    public function form()
        {
            return view('form');
        }

    public function receive(Request $request)
    {
        $imname = 'user_default'. '.' . $request->image->extension();
        $request->image->storeAs('usersImage', $imname);
    }


}
