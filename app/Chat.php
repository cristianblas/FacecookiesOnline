<?php

namespace App;

use App\Friend;
use App\Message;
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
            $data2[] = $user->name;
            $data3[] = $user->email;
        }
        $available = Chat::
        return($available);
    }
    
}
