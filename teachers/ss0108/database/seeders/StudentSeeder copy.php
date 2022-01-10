<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
// use Illuminate\Support\Carbon;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('students')->truncate();

        DB::table('students')->insert([
            'name' => 'Amy',
            'photo' => 'bg01.jpg',
            'chinese' => 90,
            'english' => 91,
            'math' => 92,
            'created_at' => now()->format('Y-m-d H:i:s'),
            'updated_at' => now()->format('Y-m-d H:i:s'),

        ]);

        DB::table('students')->insert([
            'name' => 'Bob',
            'photo' => 'bg01.jpg',
            'chinese' => 80,
            'english' => 81,
            'math' => 82,
            'created_at' => now()->format('Y-m-d H:i:s'),
            'updated_at' => now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('students')->insert([
            'name' => 'Cat',
            'photo' => 'bg01.jpg',
            'chinese' => 70,
            'english' => 71,
            'math' => 72,
            'created_at' => now()->format('Y-m-d H:i:s'),
            'updated_at' => now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('students')->insert([
            [
                'name' => 'Dog', 'photo' => 'bg04.jpg', 'chinese' => 70, 'english' => 71, 'math' => 72,
                'created_at' => now()->format('Y-m-d H:i:s'), 'updated_at' => now()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Egg', 'photo' => 'bg03.jpg', 'chinese' => 60, 'english' => 61, 'math' => 62,
                'created_at' => now()->format('Y-m-d H:i:s'), 'updated_at' => now()->format('Y-m-d H:i:s'),
            ]
        ]);
        //php artisan db:seed --class=StudentSeeder
    }
}
