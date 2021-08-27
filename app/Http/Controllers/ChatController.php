<?php

namespace App\Http\Controllers;

use App\Events\MessageCreatedEvent;
use Illuminate\Support\Facades\DB;
use App\Models\Message;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ChatController extends Controller
{
    public function index()
    {
        $messages = Message::all()->take(20) ;
        $onlineUsers = [] ;
        $online = DB::table('sessions')->whereNotNull('user_id')->where('last_activity', '>', Carbon::now()->subMinute(2))->get(); 
        foreach ($online as $user) {
            array_push($onlineUsers,$user->user_id);            
        }
        $onlineUsers = array_unique($onlineUsers);
        $users = [];
        foreach ($onlineUsers as $user) {
            $us = User::findOrFail($user);
            array_push($users,$us);
        
        }
        return view('chat', [
            'messages' => $messages,
            'onlines' => $onlineUsers,
            'usersOnline' => $users,
        ]);
    }

    public function userOnline()
    {
        $onlineUsers = [] ;
        $online = DB::table('sessions')->whereNotNull('user_id')->where('last_activity', '>', Carbon::now()->subMinute(2))->get(); 
        foreach ($online as $user) {
            array_push($onlineUsers,$user->user_id);            
        }
        $onlineUsers = array_unique($onlineUsers);
        $users = [];
        foreach ($onlineUsers as $user) {
            $us = User::findOrFail($user);
            array_push($users,$us);
        }
        $userName = [];
        foreach ($users as $user ) {
            array_push($userName, $user->name);
        }
        return response()->json([
            'onlineCount' => count($onlineUsers),
            'userOnline' => $userName,
        ]) ; 
    }
}
