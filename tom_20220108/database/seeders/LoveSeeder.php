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
    DB::table("loves")->truncate();

    for ($i = 1; $i <= 250; $i++) {
      for ($j = 1; $j <= rand(0, 5); $j++) {
        DB::table("loves")->insert([
          "student_id" => $i,
          "loves_name" => Str::random(1) . $j,
          "created_at" => now(),
          "updated_at" => now()
        ]);
      }
    }
  }
}