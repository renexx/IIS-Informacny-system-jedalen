<?php

use Illuminate\Database\Seeder;

class VodicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("vodic")->insert(array(
            array(
                "login" => "vodic",
                "password" => bcrypt("vodic"),
                "meno"  => "Ján",
                "priezvisko" => "Zápotočný",
                "mesto" => "Brno",
                "ulica" => "Timravská",
                "cislo_domu" => 17,
                "psc"   => "60200",
            ),

            array(
                "login" => "vodic1",
                "password" => bcrypt("vodic"),
                "meno"  => "Ondrej",
                "priezvisko" => "Machuľa",
                "mesto" => "Brno",
                "ulica" => "Tajovského",
                "cislo_domu" => 12,
                "psc"   => "60200",
             ),
            array(
                "login" => "vodic2",
                "password" => bcrypt("vodic"),
                "meno"  => "Janka",
                "priezvisko" => "Danková",
                "mesto" => "Brno",
                "ulica" => "Pekárenská",
                "cislo_domu" => 8,
                "psc"   => "60200",
            ),
            array(
                "login" => "vodic3",
                "password" => bcrypt("vodic"),
                "meno"  => "Juraj",
                "priezvisko" => "Jánošík",
                "mesto" => "Brno",
                "ulica" => "Zbojnícka",
                "cislo_domu" => 15,
                "psc"   => "60230",
            ),

        ));
    }
}
