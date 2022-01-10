<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LoveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('loves')->truncate();

        for ($i = 1; $i <= 250; $i++) {
            $loveCount = rand(3,5);
            for ($j=1; $j <= $loveCount ; $j++) { 
                DB::table('loves')->insert([
                    'student_id' => $i,
                    'name' =>  'love'.rand(000,999),
                    'created_at' => now()->format('Y-m-d H:i:s'),
                    'updated_at' => now()->format('Y-m-d H:i:s')
                ]);
            }
            
        }
    }
}
