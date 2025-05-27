<?php

namespace App\Http\Controllers;

use App\Models\Cuadro;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


class CuadroController 
{
    public function index(Request $request)
    {
        $query = Cuadro::query();
    
        if ($request->has('buscar')) {
            $query->where('titulo', 'like', '%' . $request->buscar . '%');
        }
    
        $cuadros = $query->get();
    
        return view('cuadros.index', compact('cuadros'));
    }
    public function show($id)
    {
        $cuadro = Cuadro::findOrFail($id);
    
        $comentarios = $cuadro->comentarios()->with('usuario', 'likes')->latest()->get();
    
        return view('cuadros.show', compact('cuadro', 'comentarios'));
    }
    

public function create()
{
    return view('cuadros.create');


}
public function store(Request $request)
{
    $request->validate([
        'titulo' => 'required|string|max:255',
        'descripcion' => 'nullable|string',
        'imagen' => 'nullable|image|max:2048',
        'anio_creacion' => 'required|integer|min:1000|max:' . date('Y'),
        'tecnica' => 'nullable|string|max:255',
        'dimensiones' => 'nullable|string|max:255',
        'estilo' => 'nullable|string|max:255',
    ]);
    
    $cuadro = new Cuadro([
        'titulo' => $request->titulo,
        'descripcion' => $request->descripcion,
        'anio_creacion' => $request->anio_creacion,
        'tecnica' => $request->tecnica,
        'dimensiones' => $request->dimensiones,
        'estilo' => $request->estilo,
    ]);
    
    if ($request->hasFile('imagen')) {
        $ruta = $request->file('imagen')->store('cuadros', 'public');
        $cuadro->imagen = $ruta;
    }
    
    $cuadro->save();
    return redirect()->route('cuadros')->with('success', 'Cuadro creado correctamente.');

}
public function edit(Cuadro $cuadro)
{
    return view('cuadros.edit', compact('cuadro'));
}

public function update(Request $request, Cuadro $cuadro)
{
    $request->validate([
        'titulo' => 'required|string|max:255',
        'descripcion' => 'nullable|string',
        'imagen' => 'nullable|image|max:2048',
        'anio_creacion' => 'required|integer|min:1000|max:' . date('Y'),
        'tecnica' => 'nullable|string|max:255',
        'dimensiones' => 'nullable|string|max:255',
        'estilo' => 'nullable|string|max:255',
    ]);

    $cuadro->fill($request->except('imagen'));

    if ($request->hasFile('imagen')) {
        $ruta = $request->file('imagen')->store('cuadros', 'public');
        $cuadro->imagen = $ruta;
    }

    $cuadro->save();

    return redirect()->route('cuadros')->with('success', 'Cuadro actualizado correctamente.');
}

public function destroy(Cuadro $cuadro)
{
    if ($cuadro->imagen && Storage::exists($cuadro->imagen)) {
        Storage::delete($cuadro->imagen);
    }

    $cuadro->delete();

    return redirect()->route('cuadros')->with('success', 'Cuadro eliminado correctamente.');
}


}
