<?php

namespace Database\Seeders;

use App\Models\Estudiante;
use Illuminate\Database\Seeder;

class EstudianteSeeder extends Seeder
{
    public function run(): void
    {
        $nombres = [
            'Balcazar Alvear Cristopher Joel',
            'Barre Suarez Kimberly Jaritza',
            'Cadmen Zhinin Angel Ismael',
            'Camalle Baque Gissela Leisly',
            'Cevallos Sanchez Ammy Skarleth',
            'Chala Polo Jesus David',
            'Correa Vera Lesly Vanessa',
            'Espinoza Muñoz Ana Lucia',
            'Gomez Rodriguez Karla Mayeli',
            'Guanoquiza Toapanta Nicole Estefania',
            'Lituma Marmol Juliet Viviana',
            'Mejia Alcivar Juan David',
            'Mera Burgos Maria Mishelle',
            'Merino Palacios Maite Julieth',
            'Montero Galeas Dennise Estefania',
            'Montes de Oca Gonzalez Sebastian Alexander',
            'Morales Zamora Jostin Ariel',
            'Muriel Rengifo Luis Mario',
            'Navarrete Lara Dylan Josue',
            'Ordoñez Pazto Stalin Ismael',
            'Patiño Cuastuza Mateo Santiago',
            'Porras Cedeño Nathaly Jordana',
            'Puenayan Vite Jostin Sebastian',
            'Quiroz Loor Aris Rubers',
            'Romero Villalba Gabriel Joseph',
            'Solorzano Vinces Fernando Joel',
            'Suarez Cabeza Genesis Gabriela',
            'Tapia Granda Maykel Gabriel',
            'Torres Bravo Damian Alexander',
            'Yela Lopez Dennysis Camila',
            'Zambrano Moreira Brithany Julieth',
        ];

        foreach ($nombres as $i => $nombre) {
            Estudiante::updateOrCreate(
                ['numero_lista' => $i + 1],
                ['nombre' => $nombre]
            );
        }
    }
}