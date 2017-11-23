<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeCatColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('csvimport', function ($table) {
        $table->string('middle_cat_id')->change();
        $table->string('small_cat_id')->change();
        $table->string('detail_cat_id')->change();
        $table->date('ins_date')->nullable()->change();
        $table->string('ins_id')->nullable()->change();
        $table->date('upd_date')->nullable()->change();
        $table->string('upd_id')->nullable()->change();
        $table->date('del_date')->nullable()->change();
        $table->string('del_id')->nullable()->change();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
