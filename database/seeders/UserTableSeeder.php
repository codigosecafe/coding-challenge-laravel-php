<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('user')->delete();

        \DB::table('user')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Joao',
                'slug_name' => 'joao',
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'Jose',
                'slug_name' => 'jose',
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'Paulo',
                'slug_name' => 'paulo',
            ),
        ));


    }
}
