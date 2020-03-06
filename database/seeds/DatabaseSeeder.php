<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        //$this->call("VodicTableSeeder");
        //$this->call("StravnikTableSeeder");
        //$this->call("PrevadzkaTableSeeder");
        $this->call(PrevadzkaTableSeeder::class);
        $this->call(StravnikTableSeeder::class);
        $this->call(VodicTableSeeder::class);
        $this->call(ObjednavkaTableSeeder::class);
        $this->call(StalaPonukaTableSeeder::class);
        $this->call(JedloTableSeeder::class);
        $this->call(NapojTableSeeder::class);
        $this->call(DennaPonukaTableSeeder::class);
        $this->call(DennaPonukaJedloTableSeeder::class);
        $this->call(DennaPonukaNapojTableSeeder::class);
        $this->call(ObjednavkaJedloTableSeeder::class);
        $this->call(ObjednavkaNapojTableSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(OperatorSeeder::class);
    }
}
