<?php

use Illuminate\Database\Seeder;

class StravnikTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("users")->insert(array(
            array(
                "email" => "jozef.petrasnik@gmail.com",
                "password" => bcrypt("password"),
                "name"  => "Jozef",
                "lastname" => "Petrašník",
                "mesto" => "Brno",
                "ulica" => "Juliánska",
                "cislo_domu" => 1,
                "psc"   => "60280",
            ),

            array(
                "email" => "filipk@gmail.com",
                "password" => bcrypt("password"),
                "name"  => "Filip",
                "lastname" => "Kotol",
                "mesto" => "Brno",
                "ulica" => "Pekárenská",
                "cislo_domu" => 8,
                "psc"   => "60200",
            ),
            array(
                "email" => "zzadna@gmail.com",
                "password" => bcrypt("password"),
                "name"  => "Zdenka",
                "lastname" => "Zadná",
                "mesto" => "Brno",
                "ulica" => "Slovenská",
                "cislo_domu" => 48,
                "psc"   => "60200",
            ),
            array(
                "email" => "tasler@gmail.com",
                "password" => bcrypt("password"),
                "name"  => "Ivana",
                "lastname" => "Táslerová",
                "mesto" => "Brno",
                "ulica" => "Spevácka",
                "cislo_domu" => 69,
                "psc"   => "60230",
            ),
            array(
                "email" => "druko@gmail.com",
                "password" => bcrypt("password"),
                "name"  => "Juraj",
                "lastname" => "Druko",
                "mesto" => "Brno",
                "ulica" => "Božetěchova",
                "cislo_domu" => 6,
                "psc"   => "60230",
            ),
            array(
                "email" => "igor@gmail.com",
                "password" => bcrypt("password"),
                "name"  => "Igor",
                "lastname" => "Krempaský",
                "mesto" => "Brno",
                "ulica" => "Mánesova",
                "cislo_domu" => 17,
                "psc"   => "60230",
            ),
            array(
                "email" => "jantribula@gmail.com",
                "password" => bcrypt("password"),
                "name"  => "Ján",
                "lastname" => "Tribula",
                "mesto" => "Brno",
                "ulica" => "Grohova",
                "cislo_domu" => 5,
                "psc"   => "60230",
            ),

        ));
    }
}
