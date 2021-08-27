<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{
    public function index()
    {
        return view('userAccount');
    }
    
public function setPP()
{

    return view('account.setImage', [
        'user' => Auth::user()
    ]);
}

    public function pp(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:png,jpg,jpeg'
        ]);
        $imname = str_replace(' ', '',Auth::user()->name) . '_pp.' . $request->image->extension();
        $request->image->storeAs('public/usersImage', $imname);
        $path = 'usersImage/' . $imname;
        $user =  User::find(Auth::user()->id);
        
        $user->image()->create([
            'path' => $path,
            'user_id' => Auth::user()->id,
        ]);
        return back();
    }
}
