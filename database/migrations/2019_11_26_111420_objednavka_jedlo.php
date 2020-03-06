<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ObjednavkaJedlo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //CREATE TABLE OBJEDNAVKA_JEDLO(
        //    ID_OBJEDNAVKA INT NOT NULL,
        //    ID_JEDLO INT NOT NULL,
        //
        //    PRIMARY KEY(ID_OBJEDNAVKA, ID_JEDLO),
        //    FOREIGN KEY(ID_OBJEDNAVKA) REFERENCES OBJEDNAVKA(ID_OBJEDNAVKA),
        //    FOREIGN KEY(ID_JEDLO) REFERENCES JEDLO(ID_JEDLO)
        //);
        Schema::create("objednavka_jedlo",function (Blueprint $table){
           $table->integer("id_objednavka")->unsigned();
           $table->integer("id_jedlo")->unsigned();
           //$table->primary(["id_objednavka","id_jedlo"]);
        });
        Schema::table("objednavka_jedlo",function (Blueprint $table){
            $table->primary(["id_objednavka","id_jedlo"]);
            $table->foreign("id_objednavka")->references("id_objednavka")->on("objednavka")->onDelete('cascade');;
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
        Schema::dropIfExists("objednavka_jedlo");
    }
}
