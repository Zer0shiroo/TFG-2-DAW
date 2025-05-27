<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $fillable = ['contenido', 'usuario_id', 'cuadro_id','libro_id'];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function cuadro()
    {
        return $this->belongsTo(Cuadro::class);
    }
    public function libro()
{
    return $this->belongsTo(Libro::class);
}


    public function likes()
    {
        return $this->belongsToMany(Usuario::class, 'comentario_user', 'comentario_id', 'usuario_id')->withTimestamps();
    }
    
}
