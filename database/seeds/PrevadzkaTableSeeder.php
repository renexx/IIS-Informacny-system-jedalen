<?php

use Illuminate\Database\Seeder;

class PrevadzkaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("prevadzka")->insert(array(
            array(
                "nazov" => "U Taliana",
                "mesto" => "Brno",
                "ulica" => "Semilasso",
                "cislo_domu" => 56,
                "psc"   => "60200",
                "uzv_objednavok" => "21:00:00",
                "koniec_objednavok" => "nie",
                "obrazok" => "restaurant1.jpg"
            ),

            array(
                "nazov" => "U opice",
                "mesto" => "Brno",
                "ulica" => "Karpatská",
                "cislo_domu" => 99,
                "psc"   => "60230",
                "uzv_objednavok" => "21:00:00",
                "koniec_objednavok" => "nie",
                "obrazok" => "restaurant2.jpg"
            ),
            array(
                "nazov" => "U vlka",
                "mesto" => "Brno",
                "ulica" => "Slovanská",
                "cislo_domu" => 55,
                "psc"   => "60200",
                "uzv_objednavok" => "21:00:00",
                "koniec_objednavok" => "nie",
                "obrazok" => "restaurant3.jpg"
            ),
            array(
                "nazov" => "Pizza & Pasta",
                "mesto" => "Brno",
                "ulica" => "Bayerova",
                "cislo_domu" => 6,
                "psc"   => "60200",
                "uzv_objednavok" => "23:00:00",
                "koniec_objednavok" => "nie",
                "obrazok" => "restaurant4.jpg"
            ),
            array(
                "nazov" => "U vegána",
                "mesto" => "Brno",
                "ulica" => "Poľská",
                "cislo_domu" => 4,
                "psc"   => "60280",
                "uzv_objednavok" => "20:00:00",
                "koniec_objednavok" => "nie",
                "obrazok" => "restaurant5.jpg"
            ),
            array(
                "nazov" => "U starej mami",
                "mesto" => "Brno",
                "ulica" => "Stará",
                "cislo_domu" => 9,
                "psc"   => "60200",
                "uzv_objednavok" => "21:30:00",
                "koniec_objednavok" => "nie",
                "obrazok" => "restaurant6.jpg"
            ),
            array(
                "nazov" => "U čierneho psa",
                "mesto" => "Zbýšov",
                "ulica" => "Veterná",
                "cislo_domu" => 9,
                "psc"   => "60562",
                "uzv_objednavok" => "21:30:00",
                "koniec_objednavok" => "nie",
                "obrazok" => "restaurant1.jpg"
            ),
            array(
                "nazov" => "Krčma pod lekárňou",
                "mesto" => "Brusno",
                "ulica" => "Bosá",
                "cislo_domu" => 9,
                "psc"   => "60562",
                "uzv_objednavok" => "22:30:00",
                "koniec_objednavok" => "nie",
                "obrazok" => "restaurant1.jpg"
            ),

        ));
    }
}
