<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PhoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('phones')->truncate();

        for ($i = 1; $i <= 250; $i++) {
            DB::table('phones')->insert([
                'student_id' => $i,
                'phone' =>  '09'.rand(00,99).'-'.rand(000000,999999),

                'created_at' => now()->format('Y-m-d H:i:s'),
                'updated_at' => now()->format('Y-m-d H:i:s')
            ]);
        }
    }
}
