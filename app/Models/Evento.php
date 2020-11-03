<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Evento extends Model
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
    use SoftDeletes;
    protected $table = "eventos";
    protected $primarykey = "id";
    protected $fillable = ['nome', 'slug', 'descricao', 'data_evento', 'user_id'];
    public $timestamps = true;

    protected $guarded = [];

    public const RELATIONSHIP_EVENTO_USER = 'convites';

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function convites(){
        return $this->belongsToMany(User::class, self::RELATIONSHIP_EVENTO_USER, 'evento_id', 'user_id')->withPivot('id', 'status');
    }
}
