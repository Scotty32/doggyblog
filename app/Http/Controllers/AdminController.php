<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        if (!Gate::allows('access-admin')) {
            abort('403');
        }
        $posts = Post::all();
        $admin = User::where('admin', true)->get();
        return view('layouts.admin', [
            'posts' => $posts,
            'admin' => $admin,
        ]);
    }
    public function blockUser($id)
    {
        if (!Gate::allows('access-admin')) {
            abort('403');
        }
        $user =User::find($id);
        $user->isBlockeq = !$user->isBlockeq;
        $user->save();
        return redirect()->back()->with('message', 'utilisateur');
    }
}
