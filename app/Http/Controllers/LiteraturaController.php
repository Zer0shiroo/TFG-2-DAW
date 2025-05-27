<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class LiteraturaController 
{
    public function indexRelatoMicrorrelato(Request $request)
    {
        $query = Libro::whereIn('tipo', ['Relato', 'Microrrelato']);
    
        if ($request->has('buscar')) {
            $query->where('titulo', 'like', '%' . $request->buscar . '%');
        }
    
        $libros = $query->get();
       
        return view('libros.RelatoMicrorrelato', compact('libros'));
    }
    
    public function poesiaindex(Request $request)
    {
        $query = Libro::whereIn('tipo', ['Poesía']);
    
        if ($request->has('buscar')) {
            $query->where('titulo', 'like', '%' . $request->buscar . '%');
        }
    
        $libros = $query->get();
       
        return view('libros.poesiaindex', compact('libros'));
    }
    public function show( $id)
    {
        $libro = Libro::findOrFail($id);
        $comentarios = $libro->comentarios()->with('usuario', 'likes')->latest()->get();
        return view('libros.show', compact('libro', 'comentarios'));
    }
    public function create()
    {
        return view('libros.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'anio_publicacion' => 'required|integer|min:1000|max:' . now()->year,
            'sinopsis' => 'required|string',
            'portada' => 'required|image|max:2048',
            'tipo' => 'required|in:Relato,Microrrelato,Poesía',
        ]);
        

        $portadaPath = $request->file('portada')->store('portadas', 'public');
    
        $libro = Libro::create([
            'titulo' => $request->titulo,
            'autor' => $request->autor,
            'anio_publicacion' => $request->anio_publicacion,
            'sinopsis' => $request->sinopsis,
            'portada' => $portadaPath,
            'tipo' => $request->tipo,
        ]);
        
        switch ($libro->tipo) {
            case 'Relato':
            case 'Microrrelato':
                return redirect()->route('RelatoMicrorrelato');
            case 'Poesía':
                return redirect()->route('libros.poesiaindex');
            default:
                return redirect()->route('libros.index');
        }
        
    }

    public function edit(Libro $libro)
    {
        return view('libros.edit', compact('libro'));
    }
    public function update(Request $request, Libro $libro)
{
    $request->validate([
        'titulo' => 'required|string|max:255',
        'autor' => 'required|string|max:255',
        'anio_publicacion' => 'required|integer|min:1000|max:' . now()->year,
        'sinopsis' => 'required|string',
        'tipo' => 'required|in:Relato,Microrrelato,Poesía',
        'portada' => 'nullable|image|max:2048',
    ]);

    if ($request->hasFile('portada')) {
        $portadaPath = $request->file('portada')->store('portadas', 'public');
        $libro->portada = $portadaPath;
    }

    $libro->titulo = $request->titulo;
    $libro->autor = $request->autor;
    $libro->anio_publicacion = $request->anio_publicacion;
    $libro->sinopsis = $request->sinopsis;
    $libro->tipo = $request->tipo;

    $libro->save();

    switch ($libro->tipo) {
        case 'Relato':
        case 'Microrrelato':
            return redirect()->route('RelatoMicrorrelato');
        case 'Poesía':
            return redirect()->route('libros.poesiaindex');
        default:
            return redirect()->route('libros.index');
    }
}

public function destroy(Libro $libro)
{
    if ($libro->portada && Storage::exists($libro->portada)) {
        Storage::delete($libro->imagen);
    }

    $libro->delete();

    return redirect()->route('RelatoMicrorrelato')->with('success', 'Libro eliminado correctamente.');
}
    
}
