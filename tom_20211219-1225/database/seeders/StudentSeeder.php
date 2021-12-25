<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StudentSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   * 
   * php artisan db:seed --class=UserSeeder
   */
  public function run()
  {
    // 清空資料表
    DB::table("students")->truncate();

    // 迴圈建立
    for ($i = 1; $i <= 250; $i++) {
      $rand = function ($num) {
        $result = rand(1, $num);
        if ($result < 10) $result = "0" . $result;
        if ($result > 12 && $result < 20) $result = "10";
        return $result;
      };

      DB::table('students')->insert([
        'name' => Str::random(3),
        'photo' => "bg" . $rand(12) . ".jpg",
        'chinese' => $rand(99),
        'english' => $rand(99),
        'math' => $rand(99),
        "created_at" => now(),
        "updated_at" => now()
      ]);
    }



    /** 手動建立
      DB::table("students")->insert([
        [
          "name" => "Amy",
          "photo" => "AMY-bg09.jpg",
          "chinese" => 10,
          "english" => 11,
          "math" => 12,
          "created_at" => now(),
          "updated_at" => now()
        ],
        [
          "name" => "Bob",
          "photo" => "BOB-bg07.jpg",
          "chinese" => 20,
          "english" => 21,
          "math" => 22,
          "created_at" => now(),
          "updated_at" => now()
        ],
        [
          "name" => "Cat",
          "photo" => "123-bg11.jpg",
          "chinese" => 30,
          "english" => 31,
          "math" => 32,
          "created_at" => now(),
          "updated_at" => now()
        ],
        [
          "name" => "Dog",
          "photo" => "TEST-bg12.jpg",
          "chinese" => 40,
          "english" => 41,
          "math" => 42,
          "created_at" => now(),
          "updated_at" => now()
        ],
        [
          "name" => "Egg",
          "photo" => "bg05-bg05.jpg",
          "chinese" => 50,
          "english" => 51,
          "math" => 52,
          "created_at" => now(),
          "updated_at" => now()
        ],
      ]);
     */
  }
}