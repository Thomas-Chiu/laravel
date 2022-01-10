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

        for ($i = 1; $i <= 250; $i++) {
            $str= rand(1,10);
            $strChange = str_pad($str,2,"0",STR_PAD_LEFT);

            DB::table('students')->insert([
                'name' => 'Name-'.rand(000,990),
                'photo' => 'bg'.$strChange.'.jpg',
                'chinese' => 90,
                'english' => 91,
                'math' => 92,
                'created_at' => now()->format('Y-m-d H:i:s'),
                'updated_at' => now()->format('Y-m-d H:i:s'),

            ]);
        }
    }
}
