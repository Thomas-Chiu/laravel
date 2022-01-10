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

            $str1 = rand(00,99);
            $str2 = rand(000000,999999);
            $str1 = $this->changeStr($str1,2);
            $str2 = $this->changeStr($str2,6);
            $changeStr = "09".$str1 ."-". $str2;

            DB::table('phones')->insert([
                'student_id' => $i,
                'phone' =>  $changeStr,

                'created_at' => now()->format('Y-m-d H:i:s'),
                'updated_at' => now()->format('Y-m-d H:i:s')
            ]);
        }
    }

    private function changeStr($str,$num){
        $changeStr = str_pad($str,$num,"0",STR_PAD_LEFT);
        return $changeStr;
    }
}
