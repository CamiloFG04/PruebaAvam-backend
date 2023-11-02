<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProProcesoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pro_procesos')->insert([
            'PRO_NOMBRE' => 'Ingeniería',
            'PRO_PREFIJO' => 'ING',
        ]);
        DB::table('pro_procesos')->insert([
            'PRO_NOMBRE' => 'Informática',
            'PRO_PREFIJO' => 'INFO',
        ]);
        DB::table('pro_procesos')->insert([
            'PRO_NOMBRE' => 'Medicina',
            'PRO_PREFIJO' => 'MED',
        ]);
        DB::table('pro_procesos')->insert([
            'PRO_NOMBRE' => 'Biología',
            'PRO_PREFIJO' => 'BIO',
        ]);
        DB::table('pro_procesos')->insert([
            'PRO_NOMBRE' => 'Economía',
            'PRO_PREFIJO' => 'ECO',
        ]);
    }
}
