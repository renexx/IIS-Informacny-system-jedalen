<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ObjednavkaNapoj extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //CREATE TABLE OBJEDNAVKA_NAPOJ(
        //    ID_OBJEDNAVKA INT NOT NULL,
        //    ID_NAPOJ INT NOT NULL,
        //
        //    PRIMARY KEY(ID_OBJEDNAVKA, ID_NAPOJ),
        //    FOREIGN KEY(ID_OBJEDNAVKA) REFERENCES OBJEDNAVKA(ID_OBJEDNAVKA),
        //    FOREIGN KEY(ID_NAPOJ) REFERENCES NAPOJ(ID_NAPOJ)
        //);
        Schema::create("objednavka_napoj",function (Blueprint $table){
           $table->integer("id_objednavka")->unsigned();
           $table->integer("id_napoj")->unsigned();
           //$table->primary(["id_objednavka","id_napooj"]);

        });
        Schema::table("objednavka_napoj",function (Blueprint $table){
           $table->primary(["id_objednavka","id_napoj"]);
           $table->foreign("id_objednavka")->references("id_objednavka")->on("objednavka")->onDelete('cascade');;
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
        Schema::dropIfExists("objednavka_napoj");
    }
}
