<?php

namespace App;

use App\Friend;
use App\Message;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillable = [
        'friend_idsolicitante',
        'friend_idsolicitado',
    ];

    public function friends(){
        return $this->belongsTo(Friend::class);
    }
    public function messages(){
        return $this->hasOne(Message::class);
    }
}
