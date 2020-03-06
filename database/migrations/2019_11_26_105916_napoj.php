<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Napoj extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //CREATE TABLE NAPOJ(
        //    ID_NAPOJ INT NOT NULL AUTO_INCREMENT,
        //    TYP ENUM('normal', 'bezlepok', 'vegan', 'vegetarian', 'raw', 'fit') NOT NULL,
        //    POPIS TEXT NOT NULL,
        //    CENA DECIMAL(13,2) NOT NULL,
        //    -- OBRAZOK
        //    DOSTUPNOST ENUM('ano', 'nie') NOT NULL,
        //    -- ALERGENY
        //    OBJEM INT NOT NULL,
        //    KATEGORIA ENUM('vino', 'pivo', 'kava', 'caj', 'drink', 'limonady') NOT NULL,
        //    ALKO ENUM('ano', 'nie') NOT NULL,
        //    ID_STALA_PONUKA INT NOT NULL,
        //
        //    PRIMARY KEY(ID_NAPOJ),
        //    FOREIGN KEY(ID_STALA_PONUKA) REFERENCES STALA_PONUKA(ID_STALA_PONUKA)
        //);
         Schema::create("napoj",function (Blueprint $table){
             $table->increments("id_napoj"); //auto inkrement PK
             $table->enum("typ",["normal", "bezlepok", "vegan", "vegetarian", "raw", "fit"]);
             $table->text("popis");
             $table->float("cena",8,2); //float ? decimal? double?
             $table->enum("dostupnost",["ano","nie"]);
             $table->integer("objem");
             $table->enum("kategoria",["vino","pivo","kava","caj","drink","limonady"]);
             $table->enum("alko",["ano","nie"]);
             $table->integer("id_stala_ponuka")->unsigned();
             $table->string("obrazok")->nullable();
         });
         Schema::table("napoj",function (Blueprint $table){
            $table->foreign("id_stala_ponuka")->references("id_stala_ponuka")->on("stala_ponuka")->onDelete('cascade');;
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("napoj");
    }
}
