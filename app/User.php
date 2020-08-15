<?php

namespace App;

use App\Friend ;
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
    protected $status = ['true'];
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

    public function friends(){
        return $this->belongsToMany(Friend::class);
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
}
