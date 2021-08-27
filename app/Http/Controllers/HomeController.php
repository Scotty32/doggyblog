<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use App\Models\Dog;
use App\Models\Image;
use App\Models\Post;
use App\Models\Rate;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use function PHPSTORM_META\type;

class HomeController extends Controller
{

    public function index()
    {
        // ritrieving posts by updated_at order
        $post = Post::orderBy('updated_at', 'desc')->get();
        //dd($post_best->first());
        
        // take the most liked posts 
        $quer = 
        function (Builder $query)
        {
            global $request;
            $query->all();
        };

        $liked_post = Rate::whereHasMorph(
            'rateable',
            Post::class)->orderBy('likes', 'asc')->take(5)->get();
        
        // get current user
        $user = Auth::user();
            /* $comment = Comment::where('id', $post->comment_id)->get();
         */
        //dd($user->imagesDefault()->path, $user->images->path);
        //dd($dog);
        return view('home', [
            'posts' => $post,
            'bests' => $liked_post, 
            'user' => $user,
            //'dog' => 
        ]);

        
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
