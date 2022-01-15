<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DelTestToPhones extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('phones', function (Blueprint $table) {
      // 練習二：透過 migration 刪除 test 欄位
      $table->dropColumn("test");
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('phones', function (Blueprint $table) {
      //
    });
  }
}