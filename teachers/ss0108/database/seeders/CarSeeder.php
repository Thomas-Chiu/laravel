<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cars')->truncate();

        for ($i = 1; $i <= 50; $i++) {
            $str= rand(1,10);
            $strChange = str_pad($str,3,"0",STR_PAD_LEFT);

            DB::table('cars')->insert([
                'name' => 'car-'.rand(000,990),               
                'created_at' => now()->format('Y-m-d H:i:s'),
                'updated_at' => now()->format('Y-m-d H:i:s'),

            ]);
        }
    }
}
