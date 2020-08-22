<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'user_id',
        'content',
        'type',
        'unread',
    ];
    public static function getUnread(){
        $my_id=(auth()->user()->id);
        $data=DB::table('notifications')    
        ->select('id','content','type','unread') 
        ->where('user_id','=',$my_id)
        ->where('unread','=',0)
        ->get();
        return $data;
    }
    public static function deleteUnread($id){
        $notificacion=Notification::find($id);
        $notificacion->unread=1;
        $notificacion->save();
    }
}

