<?php

use Illuminate\Database\Seeder;

class OperatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("operator")->insert(array(
            array(
                "login" => "operator",
                "password" => bcrypt("operator"),
            ),
            array(
                "login" => "operator1",
                "password" => bcrypt("operator1"),
            ),
            array(
                "login" => "operator2",
                "password" => bcrypt("operator2"),
            ),
        ));
    }
}
