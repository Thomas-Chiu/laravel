<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTestToPhones extends Migration
{
  /**
   * Run the migrations.
   * 2021-11-20 客戶需求增加 XX 欄位
   * @return void
   */
  public function up()
  {
    Schema::table('phones', function (Blueprint $table) {
      // 練習一：透過 migration 在 create_at 之前新增 test 欄位
      $table->string("test")->comment("我是註解")->after("phone");
      $table->integer("test_id")->after("test");
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
      // 建立 rollback
      $table->dropColumn(["test", "test_id"]);
    });
  }
}