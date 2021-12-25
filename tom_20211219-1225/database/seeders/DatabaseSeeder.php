<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    // 執行全部 seeder
    $this->call([
      StudentSeeder::class,
      PhoneSeeder::class,
      LocationSeeder::class,
      LoveSeeder::class,
    ]);
  }
}