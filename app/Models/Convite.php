<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Convite extends Model
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
    use HasFactory;
    protected $table = "convites";
    protected $primarykey = "id";
    protected $fillable = ['id', 'user_id', 'evento_id', 'status'];
    public $timestamps = true;

    public function eventos(){
        return $this->belong(Evento::class, 'user_id', 'user_id');
    }
}
