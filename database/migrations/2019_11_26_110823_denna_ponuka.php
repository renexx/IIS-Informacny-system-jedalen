<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DennaPonuka extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //CREATE TABLE DENNA_PONUKA(
        //    ID_DENNA_PONUKA INT NOT NULL AUTO_INCREMENT,
        //    INTERNY_LIMIT INT NOT NULL,
        //    OZNACENIE INT NOT NULL,
        //
        //    PRIMARY KEY(ID_DENNA_PONUKA),
        //    FOREIGN KEY(OZNACENIE) REFERENCES PREVADZKA(OZNACENIE)
        //);
        Schema::create("denna_ponuka",function (Blueprint $table){
           $table->increments("id_denna_ponuka");//auto inrement preto je to PK
           $table->integer("interny_limit");
           $table->integer("oznacenie")->unsigned();
        });
        Schema::table("denna_ponuka",function (Blueprint $table){
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
        Schema::dropIfExists("denna_ponuka");
    }
}
