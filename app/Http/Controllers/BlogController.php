<?php

namespace App\Http\Controllers;

use App\Models\Cuadro; 
use App\Models\Libro; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;    
use App\Models\Visita;
use App\Mail\BienvenidaMailable;
use Illuminate\Support\Facades\Mail;

class BlogController 
{public function index()
{
   
    $visita = Visita::first();
    if (!$visita) {
        
        $visita = Visita::create(['contador' => 1000]);
    } else {
       
        $visita->contador++;
        $visita->save();
    }

    
    $cuadros = Cuadro::all();
    $libros = Libro::all();

    
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

public function enviarCorreo($id)
{
    $usuario = Usuario::find($id);
      Mail::to($usuario->email)->send(new BienvenidaMailable($usuario));

    return 'Correo enviado';
}



}