<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table(table: 'users')->insert(values: [
            [
                'id'        => 1,
                'name'      => 'Fafawww',
                'email'     => 'fafaw@gmail.com',
                'password'  => bcrypt('Frocky0u$'),
                'remember_token' => Str::random(60),
                'address'   => 'Jl. Palmerah Utara',
                'phonenum'  => '081234567890',
                'postalcode' => '12345',
                'profile_photo_path' => 'users/user-1.png',
                'is_admin'  => 1,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now(),
            ],
            [
                'id'        => 2,
                'name'      => 'testing2',
                'email'     => 'testing2@gmail.com',
                'password'  => bcrypt('testing2'),
                'remember_token' => Str::random(60),
                'address'   => 'Jl. Palmerah Selatan',
                'phonenum'  => '08987654310',
                'postalcode' => '54321',
                'profile_photo_path' => 'users/user-2.png',
                'is_admin'  => 0,
                'created_at'=> Carbon::now(),
                'updated_at'=> Carbon::now(),
            ]
        ]);
    }
}
