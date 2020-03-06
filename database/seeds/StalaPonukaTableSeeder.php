<?php

use Illuminate\Database\Seeder;

class StalaPonukaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("stala_ponuka")->insert(array(
            array(
               "oznacenie" => 1,
            ),

            array(
                "oznacenie" => 2,
            ),
            array(
                "oznacenie" => 3,
            ),
            array(
                "oznacenie" => 4,
            ),
            array(
                "oznacenie" => 5,
            ),
            array(
                "oznacenie" => 6,
            ),
            array(
                "oznacenie" => 7,
            ),
            array(
                "oznacenie" => 8,
            ),
        ));
    }
}
