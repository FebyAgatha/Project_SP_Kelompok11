<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run(): void
    {
        DB::table(table: 'categories')->insert(values: [
                [   'id'        => 1,
                    'name'      => 'Alam', 
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [   'id'        => 2,
                    'name'      => 'Biografi', 
                    'created_at'=> Carbon::now(),
                    'updated_at'=> Carbon::now()
                ],
                [   'id'        => 3,
                    'name'      => 'Bisnis & Ekonomi', 
                    'created_at'=> Carbon::now(),
                    'updated_at'=> Carbon::now()
                ],
                [   'id'        => 4,
                    'name'      => 'Fashion', 
                    'created_at'=> Carbon::now(),
                    'updated_at'=> Carbon::now()
                ],
                [   'id'        => 5,
                    'name'      => 'Fiksi Anak (Dongeng)', 
                    'created_at'=> Carbon::now(),
                    'updated_at'=> Carbon::now()
                ],
                [   'id'        => 6,
                    'name'      => 'Fiksi Remaja (Novel)', 
                    'created_at'=> Carbon::now(),
                    'updated_at'=> Carbon::now()
                ],
                [   'id'        => 7,
                    'name'      => 'Fiksi Ilmiah', 
                    'created_at'=> Carbon::now(),
                    'updated_at'=> Carbon::now()
                ],
                [   'id'        => 8,
                    'name'      => 'Horror', 
                    'created_at'=> Carbon::now(),
                    'updated_at'=> Carbon::now()
                ],
                [   'id'        => 9,
                    'name'      => 'Hukum', 
                    'created_at'=> Carbon::now(),
                    'updated_at'=> Carbon::now()
                ],
                [   'id'        => 10,
                    'name'      => 'Humor', 
                    'created_at'=> Carbon::now(),
                    'updated_at'=> Carbon::now()
                ],
                [   'id'        => 11,
                    'name'      => 'Politik', 
                    'created_at'=> Carbon::now(),
                    'updated_at'=> Carbon::now()
                ],
                [   'id'        => 12,
                    'name'      => 'Keluarga', 
                    'created_at'=> Carbon::now(),
                    'updated_at'=> Carbon::now()
                ],
                [   'id'        => 13,
                    'name'      => 'Kesehatan', 
                    'created_at'=> Carbon::now(),
                    'updated_at'=> Carbon::now()
                ],
                [   'id'        => 14,
                    'name'      => 'Komik', 
                    'created_at'=> Carbon::now(),
                    'updated_at'=> Carbon::now()
                ],
                [   'id'        => 15,
                    'name'      => 'Hobi', 
                    'created_at'=> Carbon::now(),
                    'updated_at'=> Carbon::now()
                ],
                [   'id'        => 16,
                    'name'      => 'Pendidikan', 
                    'created_at'=> Carbon::now(),
                    'updated_at'=> Carbon::now()
                ],
                [   'id'        => 17,
                    'name'      => 'Resep Masakan', 
                    'created_at'=> Carbon::now(),
                    'updated_at'=> Carbon::now()
                ],
                [   'id'        => 18,
                    'name'      => 'Sastra', 
                    'created_at'=> Carbon::now(),
                    'updated_at'=> Carbon::now()
                ],
                [   'id'        => 19,
                    'name'      => 'Sejarah', 
                    'created_at'=> Carbon::now(),
                    'updated_at'=> Carbon::now()
                ],
                [   'id'        => 20,
                    'name'      => 'Teknologi', 
                    'created_at'=> Carbon::now(),
                    'updated_at'=> Carbon::now()
                ],
            ]
        );
    }
}
