<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DennaPonukaNapoj extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //CREATE TABLE DENNA_PONUKA_NAPOJ(
        //    ID_DENNA_PONUKA INT NOT NULL,
        //    ID_NAPOJ INT NOT NULL,
        //
        //    PRIMARY KEY(ID_DENNA_PONUKA, ID_NAPOJ),
        //    FOREIGN KEY(ID_DENNA_PONUKA) REFERENCES DENNA_PONUKA(ID_DENNA_PONUKA),
        //    FOREIGN KEY(ID_NAPOJ) REFERENCES NAPOJ(ID_NAPOJ)
        //);
        Schema::create("denna_ponuka_napoj",function (Blueprint $table){
           $table->integer("id_denna_ponuka")->unsigned();
           $table->integer("id_napoj")->unsigned();
           //$table->primary(["id_denna_ponuka","id_napoj"]);
        });
        Schema::table("denna_ponuka_napoj",function (Blueprint $table){
           $table->primary(["id_denna_ponuka","id_napoj"]);
           $table->foreign("id_denna_ponuka")->references("id_denna_ponuka")->on("denna_ponuka")->onDelete('cascade');;
           $table->foreign("id_napoj")->references("id_napoj")->on("napoj")->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("denna_ponuka_napoj");
    }
}
