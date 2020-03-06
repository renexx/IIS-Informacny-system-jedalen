<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Objednavka extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //CREATE TABLE OBJEDNAVKA(
        //    ID_OBJEDNAVKA INT NOT NULL AUTO_INCREMENT,
        //    STAV ENUM('nova', 'vyroba', 'pripravena', 'rozvoz', 'hotovo') NOT NULL,
        //    MESTO VARCHAR(200) NOT NULL,
        //    ULICA VARCHAR(200) NOT NULL,
        //    CISLO_DOMU INT NOT NULL,
        //    PSC CHAR(5) NOT NULL,
        //    POZNAMKA TEXT,
        //    EMAIL VARCHAR(320) NOT NULL,
        //    ID_VODIC INT NOT NULL,
        //    OZNACENIE INT NOT NULL,
        //
        //    PRIMARY KEY(ID_OBJEDNAVKA),
        //    FOREIGN KEY(EMAIL) REFERENCES STRAVNIK(EMAIL),
        //    FOREIGN KEY(ID_VODIC) REFERENCES VODIC(ID_VODIC),
        //    FOREIGN KEY(OZNACENIE) REFERENCES PREVADZKA(OZNACENIE)
        //);
        Schema::create("objednavka",function (Blueprint $table){
           $table->increments("id_objednavka"); // inkrement PK
           $table->enum("stav",["nova","cakajuca","rozvoz","hotovo"]);
           $table->string("name");
           $table->string("lastname");
           $table->string("mesto");
           $table->string("ulica");
           $table->integer("cislo_domu");
           $table->char("psc",5);
           $table->enum("platba",["karta","hotovost"]);
           $table->text("poznamka")->nullable();
           $table->bigInteger("id")->unsigned()->nullable();
           $table->bigInteger("id_vodic")->unsigned()->nullable();
           $table->integer("oznacenie")->unsigned();
           //primary ked a fk
       });
       Schema::table("objednavka",function (Blueprint $table){

           $table->foreign("id")->references("id")->on("users")->onDelete('cascade');
           $table->foreign("id_vodic")->references("id")->on("vodic")->onDelete('cascade');;
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
        Schema::dropIfExists("objednavka");
    }
}
