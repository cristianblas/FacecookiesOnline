<?php

namespace App;

use App\User;
use App\Chat;
use App\Friend;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
 //   protected $status = null ;
    protected $fillable = [
        'id_solicitante',
        'id_solicitado',
    ];

    public function chats(){
        return $this->hasOne(Chat::class) ;
    }
    public function users(){
        return $this->belongsToMany(User::class);
    } 
    public static function getSolicitudes($id){

        $solicitudes=DB::table('friends')
            ->join('users','users.id','=','friends.id_solicitante')
            ->select('friends.id','name','last_name','years','gender')
            ->where('id_solicitado','=',$id)
            ->where('friends.status','=',null)
            ->get()
            ;
        return $solicitudes;
    }
    public static function updateSolicitud($id){
            $solicitud=Friend::find($id);
            $solicitud->status=true;
            $solicitud->save();
    }
    public static function deleteSolicitud($id){
        $solicitud=Friend::find($id);
        $solicitud->status=false;
        $solicitud->save();
    }


}
