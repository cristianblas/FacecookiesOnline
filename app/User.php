<?php

namespace App;

use App\Friend ;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
   // protected $status = ['true'];

    protected $style = null ;
    protected $font = null ;
    protected $fillable = [
        'name',
        'last_name',
        'email',
        'years',
        'gender',
        'telephone',
        'status',
        'style',
        'font',
        'password',
    ];

    public function friends_solicitante(){
        return $this->hasMany(Friend::class,'id_solicitante');
    }
    public function friends_solicitado(){
        return $this->hasMany(Friend::class,'id_solicitado');
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    
    public static function searchFriend($id){
        $solicitudesPendientes = Friend::getSolicitado($id);
        $solicitudesEnviadas = Friend::getSolicitudes($id);
        $users = Friend::getContactos($id);
        foreach ($solicitudesPendientes as $solicitudes) {
            $data[] = $solicitudes->name;
        }
        foreach ($solicitudesEnviadas as $enviadas) {
            $data[] = $enviadas->name;
        }
        foreach ($users as $user) {
            $data[] = $user->name;
        }
        $available = User::where('admin','=',false)->where('users.id','!=',$id)
            ->orderBy('id', 'asc')->whereNotIn('name', $data)->get();
        return($available);
    }
}
