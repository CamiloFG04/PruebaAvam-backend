<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipTipoDocSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tip_tipo_docs')->insert([
            'TIP_NOMBRE' => 'Instructivo',
            'TIP_PREFIJO' => 'INS',
        ]);
        DB::table('tip_tipo_docs')->insert([
            'TIP_NOMBRE' => 'Reporte',
            'TIP_PREFIJO' => 'REP',
        ]);
        DB::table('tip_tipo_docs')->insert([
            'TIP_NOMBRE' => 'Contrato',
            'TIP_PREFIJO' => 'CON',
        ]);
        DB::table('tip_tipo_docs')->insert([
            'TIP_NOMBRE' => 'Resumen',
            'TIP_PREFIJO' => 'RES',
        ]);
        DB::table('tip_tipo_docs')->insert([
            'TIP_NOMBRE' => 'Solicitud',
            'TIP_PREFIJO' => 'SOL',
        ]);
    }
}
