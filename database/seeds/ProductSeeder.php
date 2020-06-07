<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product')->insert([
            ['id' => 1,
            'name' => 'Áo Nữ Sơ Mi Chấm Bi',
            'sku' => 'SP01',
            'quantity' => 2,
            'price' => 500000,
            'featured' => 1,
            'category_id' => 6,
            'created_at' => now(),
            'updated_at' => now()],
            ['id' => 2,
            'name' => 'Áo Nữ Phối Viền',
            'sku' => 'SP02',
            'quantity' => 3,
            'price' => 600000,
            'featured' => 1,
            'category_id' => 6,
            'created_at' => now(),
            'updated_at' => now()],
            ['id' => 3,
            'name' => 'Áo Sơ Mi Có Cổ Đúc',
            'sku' => 'SP03',
            'quantity' => 1,
            'price' => 700000,
            'featured' => 0,
            'category_id' => 6,
            'created_at' => now(),
            'updated_at' => now()],
            ['id' => 4,
            'name' => 'Áo sơ mi caro xám Xanh',
            'sku' => 'SP04',
            'quantity' => 10,
            'price' => 800000,
            'featured' => 0,
            'category_id' => 2,
            'created_at' => now(),
            'updated_at' => now()],
            ['id' => 5,
            'name' => 'Áo Sơ Mi Hoạ Tiết Đen',
            'sku' => 'SP05',
            'quantity' => 6,
            'price' => 900000,
            'featured' => 0,
            'category_id' => 2,
            'created_at' => now(),
            'updated_at' => now()],
            ['id' => 6,
            'name' => 'Áo Sơ Mi Trắng Kem',
            'sku' => 'SP06',
            'quantity' => 4,
            'price' => 1000000,
            'featured' => 1,
            'category_id' => 2,
            'created_at' => now(),
            'updated_at' => now()]

        ]
    );
    }
}
