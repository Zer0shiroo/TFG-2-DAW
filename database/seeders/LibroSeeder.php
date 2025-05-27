<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Libro;

class LibroSeeder extends Seeder
{
    public function run()
    {
        // 10 de tipo "Poesía"
        for ($i = 1; $i <= 10; $i++) {
            Libro::create([
                'titulo' => "Poema número $i",
                'autor' => "Autor Poético $i",
                'anio_publicacion' => rand(1990, 2024),
                'sinopsis' => "Este es un libro de poesía número $i, lleno de versos y emociones.",
                'portada' => 'images/portada_default.jpg',
                'tipo' => 'Poesía',
            ]);
        }

        // 10 de tipo "Relato y Microrrelato"
        for ($i = 1; $i <= 5; $i++) {
            Libro::create([
                'titulo' => "Relato número $i",
                'autor' => "Narrador $i",
                'anio_publicacion' => rand(1990, 2024),
                'sinopsis' => "Una colección de relatos y microrrelatos número $i, breves pero intensos.",
                'portada' => 'images/portada_default.jpg',
                'tipo' => 'Relato',
            ]);
        }
        for ($i = 1; $i <= 5; $i++) {
            Libro::create([
                'titulo' => "Relato número $i",
                'autor' => "Narrador $i",
                'anio_publicacion' => rand(1990, 2024),
                'sinopsis' => "Una colección de relatos y microrrelatos número $i, breves pero intensos.",
                'portada' => 'images/portada_default.jpg',
                'tipo' => 'Microrrelato',
            ]);
        }
    }
}
