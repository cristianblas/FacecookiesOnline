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
}
