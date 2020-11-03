<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    public const ROLES = [
        0 =>'Pedente',
        1 =>'Confirmado',
        2 =>'Não Confirmado',
     ];
     protected static $enums = [
        0 =>'Pedente',
        1 =>'Confirmado',
    ];
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function eventos(){
        return $this->belongsToMany(Evento::class, Evento::RELATIONSHIP_EVENTO_USER, 'user_id', 'evento_id')->withPivot('id', 'status');
    }
}
