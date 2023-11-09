<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("productos")->insert([
            'codigo' => 'BRAV-001',
            'nombre' => 'Balon de Futbol',
            'precio' => 29.30,
            'imagen' => '',
            'activo' => 1,
            'created_by' => 1,
        ]);
        DB::table("productos")->insert([
            'codigo' => 'BRAV-001',
            'nombre' => 'Balon de Basket',
            'precio' => 22.00,
            'imagen' => 'https://wilsonstore.com.co/wp-content/uploads/2023/02/WTB9300XB07-1_0000_WTB9300XB_0_7_NBA_DRV_BSKT_OR.png.cq5dam.web_.1200.1200.jpg',
            'activo' => 1,
            'created_by' => 1,
        ]);
        DB::table("productos")->insert([
            'codigo' => 'BRAV-003',
            'nombre' => 'Pelota de tenis',
            'precio' => 8.99,
            'imagen' => 'https://assets.stickpng.com/images/580b585b2edbce24c47b2b90.png',
            'activo' => 1,
            'created_by' => 1,
        ]);
        DB::table("productos")->insert([
            'codigo' => 'BRAV-004',
            'nombre' => 'Raqueta',
            'precio' => 49.50,
            'imagen' => 'https://larrytennis.com/cdn/shop/products/WR074011U_9_900x.jpg',
            'activo' => 1,
            'created_by' => 1,
        ]);
        DB::table("productos")->insert([
            'codigo' => 'BRAV-005',
            'nombre' => 'Palo de Golf',
            'precio' => 85.99,
            'imagen' => 'https://i.ebayimg.com/thumbs/images/g/TEsAAOSwIK5fsjRp/s-l225.jpg',
            'activo' => 1,
            'created_by' => 1,
        ]);
    }
}
