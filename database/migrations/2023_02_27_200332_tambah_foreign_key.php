<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TambahForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dataabsens', function($table) {
            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('restrict')->onUpdate('restrict');
        });

        Schema::table('dataabsens', function($table) {
            $table->foreign('jadwal_id')
                  ->references('id')->on('jadwals')
                  ->onDelete('restrict')->onUpdate('restrict');
        });

        Schema::table('jadwals', function($table) {
            $table->foreign('tasemeter_id')
                  ->references('id')->on('tasemeters')
                  ->onDelete('restrict')->onUpdate('restrict');
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
