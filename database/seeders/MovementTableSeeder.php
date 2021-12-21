<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MovementTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('movement')->delete();

        \DB::table('movement')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'DEADLIFT',
                'slug_name' => 'deadlift',
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'BACK SQUAT',
                'slug_name' => 'back-squat',
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'BENCH PRESS',
                'slug_name' => 'bench-press',
            ),
        ));


    }
}
