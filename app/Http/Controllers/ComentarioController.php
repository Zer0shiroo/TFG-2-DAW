<?php 
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Comentario; 
use Illuminate\Http\Request;
class ComentarioController 
{
    public function store(Request $request, $modelo_id)
{
    $request->validate([
        'contenido' => 'required|string|max:1000',
    ]);

    $comentario = new Comentario();
    $comentario->contenido = $request->contenido;
    $comentario->usuario_id = Auth::id();


    if ($request->route()->named('comentario.libro.store')) {
        $comentario->libro_id = $modelo_id;
    } else {
        $comentario->cuadro_id = $modelo_id;
    }

    $comentario->save();

    return back();
}

public function toggleLike($id)
{
    $comentario = Comentario::findOrFail($id);
    $user = Auth::user();

    if ($comentario->likes()->where('usuario_id', $user->id)->exists()) {
        $comentario->likes()->detach($user->id); // Quitar like
    } else {
        $comentario->likes()->attach($user->id); // Dar like
    }

    return back();
}
}