<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Prevadzka extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //CREATE TABLE PREVADZKA(
        //    OZNACENIE INT NOT NULL AUTO_INCREMENT,
        //    NAZOV VARCHAR(100) NOT NULL,
        //    MESTO VARCHAR(200) NOT NULL,
        //    ULICA VARCHAR(200) NOT NULL,
        //    CISLO_DOMU INT NOT NULL,
        //    PSC CHAR(5) NOT NULL,
        //    UZV_OBJEDNAVOK TIME NOT NULL,
        //
        //    PRIMARY KEY(OZNACENIE)
        //);
        Schema::create("prevadzka",function (Blueprint $table){
            $table->increments("oznacenie"); //PK lebo auto inkrement
            $table->string("nazov");
            $table->string("mesto");
            $table->string("ulica");
            $table->integer("cislo_domu");
            $table->char("psc",5);
            $table->time("uzv_objednavok")->nullable();
            $table->enum("koniec_objednavok", ["ano", "nie"]);
            $table->string("obrazok")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("prevadzka");
    }
}
