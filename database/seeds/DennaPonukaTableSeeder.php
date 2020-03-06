<?php

use Illuminate\Database\Seeder;

class DennaPonukaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("denna_ponuka")->insert(array(
            array(
               "interny_limit"  => 200,
                "oznacenie" => 1,
            ),
            array(
                "interny_limit"  => 200,
                "oznacenie" => 2,
            ),
            array(
                "interny_limit"  => 200,
                "oznacenie" => 2,
            ),
            array(
                "interny_limit"  => 200,
                "oznacenie" => 2,
             ),
            array(
                "interny_limit"  => 200,
                "oznacenie" => 3,
            ),
            array(
                "interny_limit"  => 200,
                "oznacenie" => 4,
            ),
            array(
                "interny_limit"  => 200,
                "oznacenie" => 5,
            ),
            array(
                "interny_limit"  => 200,
                "oznacenie" => 6,
            ),
            array(
                "interny_limit"  => 200,
                "oznacenie" => 7,
            ),
            array(
                "interny_limit"  => 200,
                "oznacenie" => 7,
            ),
            array(
                "interny_limit"  => 200,
                "oznacenie" => 8,
            )

        ));
    }
}
