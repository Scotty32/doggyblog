<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Services\Post\PostService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Symfony\Component\String\b;

class PostController extends Controller
{
    private PostService $postService;

    public function __construct(PostService $postService)
    {
        $this->postService= $postService;
    }

    public function index($id,  Request $request)
    {
        // make a query function which select post for comment query
        $quer =
        function (Builder $query)
        {
            global $request;
            $query->where('id','=' ,$request->id );
        };
        $post = Post::find($id);
        $user = Auth::user();
        $comment = Comment::whereHasMorph(
            'commentable',
            Post::class,
            $quer)->orderBy('updated_at', 'desc')->take(3)->get();
        return view('posts', [
            'post' => $post,
            'comments' => $comment,
            'user' => $user
        ]);
    }

    public function newPost()
    {
        return view('newpost');
    }

    public function createPost(Request $request)
    {
        $request->validate([
        'title' => 'required|string|max:255|regex:[\w]',
        'content' => 'required|string|max:255|regex:[\w]',

    ]);
    $post = Post::create([
        'title' => $request->title,
        'content' => $request->content,
        'user_id' => Auth::user()->id,
    ]);

    return back();
    }
    public function registComment(Request $request ,$id) {
        $request->validate([
            'content_comment' => 'required|regex:[\w]',
        ]);
        $post = Post::findOrFail($id);
        $comment = new Comment();
        $post->comments()->create([
            'content' => $request->content_comment,
            'post_id' => $post->id,
            'user_id' => Auth::user()? Auth::user()->id : $comment->userDefault()->id
        ]);
        return back();
    }
    public function adminUser()
    {
        return view('userAdmin');
    }

    public function likeItem(Request $request, $id)
    {
        # for like posts or comment
        # define query function
        $this->postService->likePost($id);

        return back();
    }


    public function dislikeItem(Request $request, $id)
    {
        # for like posts or comment
        # define query function
        $this->postService->dislikePost($id);

        return back();
    }

    public function bestPost(Request $request)
    {
        $best_post = Post::likeable()->ofMany('likes', 'max')->first();

        return $this->index($best_post->id, $request);
    }

    public function deleteComment(Request $request)
    {
        Post::find($request->id)->delete();
        return redirect()->route('home');
    }

}
