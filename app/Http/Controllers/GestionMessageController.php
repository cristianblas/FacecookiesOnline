<?php

namespace App\Http\Controllers;


use App\Message;
use App\Friend;
use Illuminate\Http\Request;

class GestionMessageController extends Controller
{
    public function index()
    {   
        $id=(auth()->user()->id);
        $users = Friend::getContactos($id);
        //$contacts = Chat::getChats($id);
        return view('chats.index')->with([
         //   'contactos' => $contacts,
            'users'=>$users
        ]);
       
    }
    public function getMessage($user_id)
    {   
        $my_id=(auth()->user()->id);
        $messages = Message::where(function ($query) use ($user_id, $my_id) {
            $query->where('friend_id', $user_id);
        })->oRwhere(function ($query) use ($user_id, $my_id) {
            $query->where('user_id', $my_id)->where('friend_id', $user_id);
        })->get();
        return view('messages.index', ['messages' => $messages]);
        
    }
    public function sendMessage(Request $request)
    {
        $my_id = (auth()->user()->id);
        $friend_id = $request->receiver_id;
        $content = $request->message;

        $data = new Message();
        $data->user_id = $my_id;
        $data->friend_id = $friend_id;
        $data->content = $content;
        $data->save();

        // pusher
        $options = array(
            'cluster' => 'ap2',
            'useTLS' => true
        );

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );

        $data = ['my_id' => $my_id, 'friend_id' => $friend_id]; // sending from and to user id when pressed enter
        $pusher->trigger('my-channel', 'my-event', $data);
    }
}
