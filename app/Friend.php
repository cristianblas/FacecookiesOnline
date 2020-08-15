<?php

namespace App;

use App\User;
use App\Chat;
use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
   
    protected $fillable = [
        'status',
    ];

    public function chats(){
        return $this->hasOne(Chat::class) ;
    }
    public function users(){
        return $this->belongsToMany(User::class);
    } 

}
