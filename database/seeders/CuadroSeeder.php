<?php

namespace Database\Seeders;

use App\Models\Cuadro;
use Illuminate\Database\Seeder;

class CuadroSeeder extends Seeder
{
    public function run()
    {
        $cuadros = [
            [
                'titulo' => 'La Guernica',
                'descripcion' => 'Pintura famosa de Picasso que representa la violencia y el sufrimiento de la guerra civil española.',
                'imagen' => 'https://placehold.co/600x400',
            ],
            [
                'titulo' => 'El Grito',
                'descripcion' => 'Famosa pintura de Edvard Munch que expresa una profunda ansiedad humana.',
                'imagen' => 'https://placehold.co/600x400',
            ],
            [
                'titulo' => 'La Noche Estrellada',
                'descripcion' => 'Obra maestra de Vincent van Gogh que muestra un cielo estrellado sobre un pueblo tranquilo.',
                'imagen' => 'https://placehold.co/600x400',
            ],
            [
                'titulo' => 'La Persistencia de la Memoria',
                'descripcion' => 'Obra surrealista de Salvador Dalí, famosa por sus relojes derretidos.',
                'imagen' => 'https://placehold.co/600x400',
            ],
            [
                'titulo' => 'Las Meninas',
                'descripcion' => 'Pintura barroca de Diego Velázquez que representa una escena de la corte española.',
                'imagen' => 'https://placehold.co/600x400',
            ],
            [
                'titulo' => 'El Jardín de las Delicias',
                'descripcion' => 'Famoso tríptico de Hieronymus Bosch que muestra el Edén, la vida en la Tierra y el infierno.',
                'imagen' => 'https://placehold.co/600x400',
            ],
            [
                'titulo' => 'La Ronda de Noche',
                'descripcion' => 'Famosa pintura de Rembrandt que muestra una milicia de la ciudad de Ámsterdam.',
                'imagen' => 'https://placehold.co/600x400',
            ],
            [
                'titulo' => 'La Creación de Adán',
                'descripcion' => 'Famosa pintura de Miguel Ángel que muestra a Dios dando vida a Adán en el techo de la Capilla Sixtina.',
                'imagen' => 'https://placehold.co/600x400',
            ],
            [
                'titulo' => 'La joven de la perla',
                'descripcion' => 'Pintura de Johannes Vermeer, conocida por su belleza y el misterio de la joven que la protagoniza.',
                'imagen' => 'https://placehold.co/600x400',
            ],
            [
                'titulo' => 'El Nacimiento de Venus',
                'descripcion' => 'Obra de Sandro Botticelli que representa a Venus, diosa del amor, naciendo del mar.',
                'imagen' => 'https://placehold.co/600x400',
            ],
        ];

        foreach ($cuadros as $cuadro) {
            Cuadro::create($cuadro);
        }
    }
}
