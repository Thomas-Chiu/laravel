<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarSeeder extends Seeder
{
  public function run()
  {
    DB::table("cars")->truncate();

    for ($i = 1; $i <= 250; $i++) {
      DB::table("cars")->insert([
        "cars_name" => "cars_" . rand(0, 999),
        "created_at" => now(),
        "updated_at" => now()
      ]);
    }
  }
}