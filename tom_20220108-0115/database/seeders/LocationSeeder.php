<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LocationSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table("locations")->truncate();

    for ($i = 1; $i <= 250; $i++) {
      DB::table("locations")->insert([
        "student_id" => $i,
        "location_name" => Str::random(5),
        "created_at" => now(),
        "updated_at" => now()
      ]);
    }
  }
}