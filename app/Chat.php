<?php

namespace App;

use App\Friend;
use App\Message;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillable = [
        'id_friend',
    ];
    public function friends(){
        return $this->belongsTo(Friend::class);
    }
    public function messages(){
        return $this->hasOne(Message::class);
    }
    public static function getChats($id){
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
    
}
