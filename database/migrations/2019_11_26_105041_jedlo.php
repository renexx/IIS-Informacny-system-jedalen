<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Jedlo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //CREATE TABLE JEDLO(
        //    ID_JEDLO INT NOT NULL AUTO_INCREMENT,
        //    TYP ENUM('normal', 'bezlepok', 'vegan', 'vegetarian', 'raw', 'fit') NOT NULL,
        //    POPIS TEXT NOT NULL,
        //    CENA DECIMAL(13,2) NOT NULL,
        //    -- OBRAZOK
        //    DOSTUPNOST ENUM('ano', 'nie') NOT NULL,
        //    -- ALERGENY
        //    HMOTNOST INT NOT NULL,
        //    KATEGORIA ENUM('predjedlo', 'polievka', 'hlavne', 'priloha', 'dezert', 'salat', 'snack') NOT NULL,
        //    ID_STALA_PONUKA INT NOT NULL,
        //
        //    PRIMARY KEY(ID_JEDLO),
        //    FOREIGN KEY(ID_STALA_PONUKA) REFERENCES STALA_PONUKA(ID_STALA_PONUKA)
        //);
        Schema::create("jedlo",function (Blueprint $table){
           $table->increments("id_jedlo"); //auto inkrement PK
           $table->enum("typ",["normal", "bezlepok", "vegan", "vegetarian", "raw", "fit"]);
           $table->text("popis");
           $table->float("cena",8,2); //float? decimal? double?
           $table->enum("dostupnost",["ano","nie"]);
           $table->integer("hmotnost");
           $table->enum("kategoria",["predjedlo","polievka","hlavne","priloha","dezert","salat","snack"]);
           $table->integer("id_stala_ponuka")->unsigned();
           $table->string("obrazok")->nullable();
        });
        Schema::table("jedlo",function (Blueprint $table){
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
        Schema::dropIfExists("jedlo");
    }
}
