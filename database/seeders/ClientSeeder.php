<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("clientes")->insert([
            'nombre' => 'Camilo',
            'apellido' => 'Fernandez',
            'direccion' => 'carrera 15 #23-44',
        ]);
        DB::table("clientes")->insert([
            'nombre' => 'Claudia',
            'apellido' => 'Garzon',
            'direccion' => 'calle 25 #65-35',
        ]);
        DB::table("clientes")->insert([
            'nombre' => 'Carlos',
            'apellido' => 'Gomez',
            'direccion' => 'carrera 19 #34-19',
        ]);
    }
}
