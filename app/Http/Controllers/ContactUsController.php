<?php

namespace App\Http\Controllers;

use App\Models\MessageAdmin;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactUsController extends Controller
{
    public function index()
    {
        return view('contact_us');
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'motif' => 'required|regex:[\w]',
            'message' => 'required|regex:[\w]',
        ]);
        $motif = $request->motif;
        $message = $request->message;
        $newMessage = new MessageAdmin();
        $newMessage->user_id = Auth::user()->id;
        $newMessage->motif = $motif;
        $newMessage->content = $message;
        $newMessage->save(); 
        return back();
    }
}
