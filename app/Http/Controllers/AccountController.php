<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        // to rewrite
        return back();
    }

        public function saveDog(Request $request)
        {
            Auth::user()->dogs()->create([
                'name' => $request->name,
                'age' => $request->age,
                'sexe ' => $request->sexe
            ]);
        }

}
