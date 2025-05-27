<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuadro extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descripcion',
        'imagen',
        'anio_creacion',
        'tecnica',
        'dimensiones',
        'estilo',
    ];

    public function getImagenUrlAttribute()
    {
        return asset('storage/' . $this->imagen);
    }
    public function comentarios()
{
    return $this->hasMany(Comentario::class);
}

}
