<?php

namespace App\Http\Controllers;


use App\Message;
use App\Friend;
use App\Notification;

use Illuminate\Http\Request;

class GestionMessageController extends Controller
{
    
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


        $nombre = (auth()->user()->name);
        $id_enviar = Friend::getID($friend_id);
        Notification::create([ 
            'user_id' => $id_enviar,
            'content' => $nombre ,
            'type' => 'Te ah enviado un Mensaje',
            'unread' => 0,
        ]);
        
    }
    public function getNotification(){
        $notificaciones = Notification::getUnread();
        return view('notificaciones.index',['notificaciones' => $notificaciones]);
    }
    public function destroyNotification($id){
        Notification::deleteUnread($id);
        return redirect()->route('notificaciones.index');
    }
    
}
