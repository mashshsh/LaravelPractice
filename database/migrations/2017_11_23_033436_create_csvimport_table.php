<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCsvimportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('csvimport', function (Blueprint $table) {
            $table->increments('id');
            $table->string('large_cat_id');
            $table->tinyInteger('middle_cat_id');
            $table->tinyInteger('small_cat_id');
            $table->tinyInteger('detail_cat_id');
            $table->string('cat_name');
            $table->softDeletes();
            $table->date('ins_date');
            $table->string('ins_id');
            $table->date('upd_date');
            $table->string('upd_id');
            $table->date('del_date');
            $table->string('del_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('csvimport');
    }
}
