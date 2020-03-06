<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DennaPonukaJedlo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //CREATE TABLE DENNA_PONUKA_JEDLO(
        //    ID_DENNA_PONUKA INT NOT NULL,
        //    ID_JEDLO INT NOT NULL,
        //
        //    PRIMARY KEY(ID_DENNA_PONUKA, ID_JEDLO),
        //    FOREIGN KEY(ID_DENNA_PONUKA) REFERENCES DENNA_PONUKA(ID_DENNA_PONUKA),
        //    FOREIGN KEY(ID_JEDLO) REFERENCES JEDLO(ID_JEDLO)
        //);
        Schema::create("denna_ponuka_jedlo",function (Blueprint $table){
           $table->integer("id_denna_ponuka")->unsigned();
           $table->integer("id_jedlo")->unsigned();
           //$table->primary(["id_denna_ponuka","id_jedlo"]);
        });
        Schema::table("denna_ponuka_jedlo",function (Blueprint $table){
           $table->primary(["id_denna_ponuka","id_jedlo"]);
           $table->foreign("id_denna_ponuka")->references("id_denna_ponuka")->on("denna_ponuka")->onDelete('cascade');;
           $table->foreign("id_jedlo")->references("id_jedlo")->on("jedlo")->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("denna_ponuka_jedlo");
    }
}
