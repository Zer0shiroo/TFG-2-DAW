<?php

namespace App\Http\Controllers;

use App\Models\Cuadro; 
use App\Models\Libro; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;    
use App\Models\Visita;
class BlogController 
{public function index()
{
    // Obtener el primer registro de visitas (o crear uno si no existe)
    $visita = Visita::first();
    if (!$visita) {
        // Si no existe un registro, creamos uno con contador 1
        $visita = Visita::create(['contador' => 1000]);
    } else {
        // Si ya existe, incrementamos el contador
        $visita->contador++;
        $visita->save();
    }

    // Obtener los cuadros y libros
    $cuadros = Cuadro::all();
    $libros = Libro::all();

    // Pasar el contador de visitas a la vista junto con los demás datos
    return view('blog.index', compact('cuadros', 'libros', 'visita'));
}
    public function verPerfil()
    {
        
        return view('blog.perfilUsuario', );
    }
    public function actualizarPerfil(Request $request)
{
    $user = Usuario::find(Auth::id());

    $request->validate([
        'nombre' => 'required|string|max:255',
        'email' => 'required|email|unique:usuarios,email,' . $user->id,
        'avatar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    $user->nombre = $request->nombre;
    $user->email = $request->email;

    if ($request->hasFile('avatar')) {
        $path = $request->file('avatar')->store('avatars', 'public');
        $user->avatar = $path;
    }

    $user->save();

    return redirect()->back()->with('success', 'Perfil actualizado correctamente.');
}
public function actualizarAvatar(Request $request)
{
    $request->validate([
        'avatar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $user = Usuario::find(Auth::id());
    $path = $request->file('avatar')->store('avatars', 'public');
    $user->avatar = $path;
    $user->save();
    return redirect()->back()->with('success', 'Avatar actualizado correctamente.');
}
public function premios()
{
    return view('blog.premios');
}


public function contacto()
{
    return view('blog.contacto');
}
public function sobremi()
{
    return view('blog.sobremi');
}



}