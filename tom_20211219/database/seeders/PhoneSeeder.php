<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhoneSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table("phones")->truncate();

    for ($i = 1; $i <= 250; $i++) {
      DB::table("phones")->insert([
        "student_id" => $i,
        // 用 php rand() 產生亂數
        "phone" => "09" . rand(0, 99999999),
        "created_at" => now(),
        "updated_at" => now()
      ]);
    }
  }
}