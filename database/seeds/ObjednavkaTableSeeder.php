<?php

use Illuminate\Database\Seeder;

class ObjednavkaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("objednavka")->insert(array(
            array(
                "stav"  => "nova",
                "name" => "Jozef",
                "lastname" => "Petrašník",
                "mesto" => "Brno",
                "ulica" => "Juliánska",
                "cislo_domu" => 1,
                "psc"   => "60280",
                "platba" => "hotovost",
                "poznamka" => "Poprosím si to teplé.",
                "id" =>  1,
                "id_vodic" => 1,
                "oznacenie" => 1,

            ),
            array(
                "stav"  => "cakajuca",
                "name" => "Jozef",
                "lastname" => "Petrašník",
                "mesto" => "Brno",
                "ulica" => "Juliánska",
                "cislo_domu" => 1,
                "psc"   => "60280",
                "platba" => "hotovost",
                "poznamka" => "Poprosím si to teplé.",
                "id" =>  1,
                "id_vodic" => 1,
                "oznacenie" => 1,

            ),

            array(
                "stav"  => "cakajuca",
                "name" => "Jan",
                "lastname" => "Hrach",
                "mesto" => "Brno",
                "ulica" => "Masná",
                "cislo_domu" => 12,
                "psc"   => "60290",
                "platba" => "hotovost",
                "poznamka" => "Bývam na treťom",
                "id" =>  1,
                "id_vodic" => 1,
                "oznacenie" => 2,

            ),

            array(
                "stav"  => "rozvoz",
                "name" => "Peter",
                "lastname" => "Mrvak",
                "mesto" => "Brno",
                "ulica" => "Bozetechova",
                "cislo_domu" => 17,
                "psc"   => "60280",
                "platba" => "karta",
                "poznamka" => "Ponahlajte sa",
                "id" =>  1,
                "id_vodic" => 1,
                "oznacenie" => 4,

            ),
            array(
                "stav"  => "cakajuca",
                "name"  => "Filip",
                "lastname" => "Kotol",
                "mesto" => "Brno",
                "ulica" => "Pekárenská",
                "cislo_domu" => 8,
                "psc"   => "60200",
                "platba" => "karta",
                "poznamka" => "Budem doma o 18tej.",
                "id" =>  2,
                "id_vodic" => 2,
                "oznacenie" => 2,
            ),
            array(
                "stav"  => "cakajuca",
                "name"  => "Zdenka",
                "lastname" => "Zadná",
                "mesto" => "Brno",
                "ulica" => "Slovenská",
                "cislo_domu" => 48,
                "psc"   => "60200",
                "platba" => "hotovost",
                "poznamka" => "-",
                "id" =>  3,
                "id_vodic" => 3,
                "oznacenie" => 3,
            ),
            array(
                "stav"  => "rozvoz",
                "name"  => "Ivana",
                "lastname" => "Táslerová",
                "mesto" => "Brno",
                "ulica" => "Spevácka",
                "cislo_domu" => 69,
                "psc"   => "60280",
                "platba" => "karta",
                "poznamka" => "Môj manžel Ivan Tásler Vás poprosí namiesto Coca-Coly Pepsi-Colu",
                "id" =>  4,
                "id_vodic" => 4,
                "oznacenie" => 4,

            ),
            

        ));
    }
}
