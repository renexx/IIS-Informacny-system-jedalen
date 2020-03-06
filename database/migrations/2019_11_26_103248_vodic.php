<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Vodic extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        //CREATE TABLE VODIC(
        //    ID_VODIC INT NOT NULL AUTO_INCREMENT,
        //    MENO VARCHAR(100) NOT NULL,
        //    PRIEZVISKO VARCHAR(100) NOT NULL,
        //    MESTO VARCHAR(200) NOT NULL,
        //    ULICA VARCHAR(200) NOT NULL,
        //    CISLO_DOMU INT NOT NULL,
        //    PSC CHAR(5) NOT NULL,
        //
        //    PRIMARY KEY(ID_VODIC)
        //);
        Schema::create("vodic",function (Blueprint $table){
            $table->bigIncrements("id"); // inkrementacia treba PK
            $table->string("login")->unique();
            $table->string("password");
            $table->string("meno");
            $table->string("priezvisko");
            $table->string("mesto");
            $table->string("ulica");
            $table->integer("cislo_domu");
            $table->char("psc",5);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
     Schema::dropIfExists("vodic");
    }
}
