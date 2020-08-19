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
    public function users_solicitante(){
        return $this->belongsTo(User::class,'id_solicitante');
    } 
    public function users_solicitado(){
        return $this->belongsTo(User::class,'id_solicitado');
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
    public static function getSolicitado($id){

        $solicitudes=DB::table('friends')
        ->join('users','users.id','=','friends.id_solicitado')
        ->select('friends.id','name','last_name','years','gender')
        ->where('id_solicitante','=',$id)
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
    public static function getContactos($id){
        $contactos1=DB::table('friends')
        ->join('users as u','u.id','=','friends.id_solicitado')
        ->join('users as un','un.id','=','friends.id_solicitante')
        ->select('friends.id','un.name','un.last_name','un.email','un.telephone','un.years','un.gender')
        ->where('u.id','=',$id,'and','friends.id_solicitado','=','u.id','and','un.id','=','id_solicitante')
        ->where('friends.status','=',true)
        ->get();
        $contactos2=DB::table('friends')
        ->join('users as u','u.id','=','friends.id_solicitado')
        ->join('users as un','un.id','=','friends.id_solicitante')
        ->select('friends.id','u.name','u.last_name','u.email','u.telephone','u.years','u.gender')
        ->where('un.id','=',$id,'and','friends.id_solicitante','=','u.id','and','un.id','=','friends.id_solicitado')
        ->where('friends.status','=',true)
        ->get();
        $contactos = $contactos1->concat($contactos2)  ;
        return $contactos;
    }
}
