<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTestIdToPhones extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('phones', function (Blueprint $table) {
      // 練習三：透過 migration 修改 test_id 欄位屬性 (加備註和預設值 55688)
      $table->integer("test_id")->comment("change() 屬性")->default("55688")->change();
      // $table->dropColumn("test_id");
      // $table->integer("test_id")->default("55688");
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
      $table->integer("test_id")->comment("")->nullable()->change();

      /*
        不要隨便刪除欄位，就算新增回去資料也會不見
        $table->dropColumn("test_id");
        $table->integer("test_id")->change();
       */
    });
  }
}