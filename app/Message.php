<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'friend_id',
        'user_id',
        'content',
    ];
    public function friendChat(){
        return $this->belongsTo(Friend::class);
    }
    public static function getMensajes($id){
        
        $mensajes = DB::table('messages')
            ->select('content')
            ->whereIn('friend_id',$id)
            ->get();
        //$contactos = $users->concat($available);
        //dd($contactos);
        return($mensajes);
    }
 /*   public static function getChats($id){
        $users = Friend::getContactos($id);
        foreach ($users as $user) {
            $data[] = $user->id;
        }
        $available = DB::table('chats')
            ->select('id','id_friend')
            ->whereIn('id_friend',$data)
            ->get();
        //$contactos = $users->concat($available);
        //dd($contactos);
        return($available);
    }
    */
}
