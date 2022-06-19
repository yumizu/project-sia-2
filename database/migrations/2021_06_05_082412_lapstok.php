<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Lapstok extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lap_stok', function (Blueprint $table){
            $table->string('kd_brg',255)->primary;
            $table->string('nm_brg', 255);
            $table->integer('harga')->default(0);
            $table->integer('stok')->default(0);
            $table->integer('beli')->default(0);
            $table->integer('retur')->default(0);
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
