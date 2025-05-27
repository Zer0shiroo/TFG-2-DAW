<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'autor', 'anio_publicacion', 'sinopsis', 'portada', 'tipo'];

    public function getPortadaUrlAttribute()
    {
        return asset('storage/' . $this->portada);
    }
    public function comentarios()
{
    return $this->hasMany(Comentario::class);
}

}
