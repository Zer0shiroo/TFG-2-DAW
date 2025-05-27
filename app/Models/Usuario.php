<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
class Usuario extends Authenticatable
{
    use HasFactory;

    protected $table = 'usuarios';

    protected $fillable = [
        'nombre', 'email', 'password', 'avatar', 'admin'
    ];
    protected $attributes = [
        'admin' => false,  
    ];

    public $timestamps = true;

    public function likedComentarios()
    {
        return $this->belongsToMany(Comentario::class, 'comentario_user', 'usuario_id', 'comentario_id')->withTimestamps();
    }
    

}


