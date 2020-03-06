<?php

use Illuminate\Database\Seeder;

class ObjednavkaJedloTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("objednavka_jedlo")->insert(array(
            array(
                "id_objednavka"  => 1,
                "id_jedlo" => 1,
            ),
            array(
                "id_objednavka"  => 2,
                "id_jedlo" => 2,
            ),
            array(
                "id_objednavka"  => 3,
                "id_jedlo" => 3,
            ),
            array(
                "id_objednavka"  => 4,
                "id_jedlo" => 4,
            ),
            array(
                "id_objednavka"  => 5,
                "id_jedlo" => 5,
            ),
            array(
                "id_objednavka"  => 6,
                "id_jedlo" => 6,
            ),
            array(
                "id_objednavka"  => 7,
                "id_jedlo" => 7,
            ),

        ));
    }
}
