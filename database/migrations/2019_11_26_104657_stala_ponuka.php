<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StalaPonuka extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //CREATE TABLE STALA_PONUKA(
        //    ID_STALA_PONUKA INT NOT NULL AUTO_INCREMENT,
        //    OZNACENIE INT NOT NULL,
        //
        //    PRIMARY KEY(ID_STALA_PONUKA),
        //    FOREIGN KEY(OZNACENIE) REFERENCES PREVADZKA(OZNACENIE)
        //);
        Schema::create("stala_ponuka",function (Blueprint $table){
           $table->increments("id_stala_ponuka"); // auto inkrement PK
           $table->integer("oznacenie")->unsigned();
        });
        Schema::table("stala_ponuka",function (Blueprint $table){
           $table->foreign("oznacenie")->references("oznacenie")->on("prevadzka")->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("stala_ponuka");
    }
}
