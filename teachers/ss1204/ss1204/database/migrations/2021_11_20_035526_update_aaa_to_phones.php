<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAaaToPhones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * 
     * php artisan make:migration update_aaa_to_phones
     */
    public function up()
    {
        //DB::statement 原生SQL
        DB::statement("ALTER TABLE phones MODIFY COLUMN aaa DATE AFTER phone");
        Schema::table('phones', function (Blueprint $table) {
            $table->integer('aaa')->comment('測試欄位aaa')->change();
            

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //DB::statement 原生SQL
        DB::statement("ALTER TABLE phones MODIFY COLUMN aaa DATE AFTER update_at");
        Schema::table('phones', function (Blueprint $table) {
            $table->integer('aaa')->comment('')->change()->after('phone');
            
        });
    }
}
    