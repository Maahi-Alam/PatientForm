<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        factory(\App\Division::class,7)->create();
        factory(\App\District::class,64)->create();
        factory(\App\Thana::class,320)->create();
        factory(\App\Patient::class,10)->create();

    }



}
