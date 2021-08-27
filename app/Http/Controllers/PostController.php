<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Rate;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Symfony\Component\String\b;

class PostController extends Controller
{
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
    
    $post->rate()->create();
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
        $quer = function (Builder $query, $type) {
            global $request;
            if ($type === Post::class) {    
            $query->where('title', '=', Post::find($request->id)->title);
            } else {
                
                $query->where('id', '=', $request->id);
            }
            
        };
        $rate = Rate::whereHasMorph(
            'rateable', Post::class,
            $quer
        )->first();
        $rate->likes ++;
        $rate->save();
        return back();
    }

    
    public function dislikeItem(Request $request, $id)
    {
        # for like posts or comment
        # define query function
        $quer = function (Builder $query, $type) {
            global $request;
            if ($type === Post::class) {    
            $query->where('title', '=', Post::find($request->id)->title);
            } else {
                
                $query->where('id', '=', $request->id);
            }
            
        };
        $rate = Rate::whereHasMorph(
            'rateable', Post::class,
            $quer
        )->first();
        
        $rate->dislikes ++;
        $rate->save();   
        return back();
    }

    public function bestPost()
    {
        $quer = 
        function (Builder $query)
        {
            global $request;
            $query->all();
        };

        $liked_post = Rate::whereHasMorph(
            'rateable',
            Post::class)->orderBy('likes', 'desc')->first();
    
        return redirect('posts/'. $liked_post->rateable->id);
    }

    public function deleteComment(Request $request)
    {
        Post::find($request->id)->delete();
        return redirect()->route('home');
    }
    
}
