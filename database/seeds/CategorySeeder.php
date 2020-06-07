<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->insert([
            ['id' => 3,
                'name' => 'Áo khoác Nữ',
                'parent_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            ['id' => 4,
                'name' => 'Áo khoác lông vũ Nữ',
                'parent_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            ['id' => 5,
                'name' => 'Áo khoác lông vũ xanh Nữ',
                'parent_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            ['id' => 6,
                'name' => 'Áo khoác Nnam',
                'parent_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            ['id' => 7,
                'name' => 'Áo khoác da Nam',
                'parent_id' => 6,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
