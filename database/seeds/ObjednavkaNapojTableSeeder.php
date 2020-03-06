<?php

use Illuminate\Database\Seeder;

class ObjednavkaNapojTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("objednavka_napoj")->insert(array(
            array(
                "id_objednavka"  => 1,
                "id_napoj" => 1,
            ),
            array(
                "id_objednavka"  => 2,
                "id_napoj" => 2,
            ),
            array(
                "id_objednavka"  => 3,
                "id_napoj" => 3,
            ),
            array(
                "id_objednavka"  => 4,
                "id_napoj" => 4,
            ),
            array(
                "id_objednavka"  => 5,
                "id_napoj" => 5,
            ),
            array(
                "id_objednavka"  => 6,
                "id_napoj" => 6,
            ),
            array(
                "id_objednavka"  => 7,
                "id_napoj" => 7,
            ),

        ));
    }
}
