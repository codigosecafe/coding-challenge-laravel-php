<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PersonalRecordTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('personal_record')->delete();
        
        \DB::table('personal_record')->insert(array (
            0 => 
            array (
                'date' => '2021-01-01 00:00:00',
                'id' => 1,
                'movement_id' => 1,
                'user_id' => 1,
                'value' => 100.0,
            ),
            1 => 
            array (
                'date' => '2021-01-02 00:00:00',
                'id' => 2,
                'movement_id' => 1,
                'user_id' => 1,
                'value' => 180.0,
            ),
            2 => 
            array (
                'date' => '2021-01-03 00:00:00',
                'id' => 3,
                'movement_id' => 1,
                'user_id' => 1,
                'value' => 150.0,
            ),
            3 => 
            array (
                'date' => '2021-01-04 00:00:00',
                'id' => 4,
                'movement_id' => 1,
                'user_id' => 1,
                'value' => 110.0,
            ),
            4 => 
            array (
                'date' => '2021-01-04 00:00:00',
                'id' => 5,
                'movement_id' => 1,
                'user_id' => 2,
                'value' => 110.0,
            ),
            5 => 
            array (
                'date' => '2021-01-05 00:00:00',
                'id' => 6,
                'movement_id' => 1,
                'user_id' => 2,
                'value' => 140.0,
            ),
            6 => 
            array (
                'date' => '2021-01-06 00:00:00',
                'id' => 7,
                'movement_id' => 1,
                'user_id' => 2,
                'value' => 190.0,
            ),
            7 => 
            array (
                'date' => '2021-01-01 00:00:00',
                'id' => 8,
                'movement_id' => 1,
                'user_id' => 3,
                'value' => 170.0,
            ),
            8 => 
            array (
                'date' => '2021-01-02 00:00:00',
                'id' => 9,
                'movement_id' => 1,
                'user_id' => 3,
                'value' => 120.0,
            ),
            9 => 
            array (
                'date' => '2021-01-03 00:00:00',
                'id' => 10,
                'movement_id' => 1,
                'user_id' => 3,
                'value' => 130.0,
            ),
            10 => 
            array (
                'date' => '2021-01-03 00:00:00',
                'id' => 11,
                'movement_id' => 2,
                'user_id' => 1,
                'value' => 130.0,
            ),
            11 => 
            array (
                'date' => '2021-01-03 00:00:00',
                'id' => 12,
                'movement_id' => 2,
                'user_id' => 2,
                'value' => 130.0,
            ),
            12 => 
            array (
                'date' => '2021-01-03 00:00:00',
                'id' => 13,
                'movement_id' => 2,
                'user_id' => 3,
                'value' => 125.0,
            ),
            13 => 
            array (
                'date' => '2021-01-05 00:00:00',
                'id' => 14,
                'movement_id' => 2,
                'user_id' => 1,
                'value' => 110.0,
            ),
            14 => 
            array (
                'date' => '2021-01-01 00:00:00',
                'id' => 15,
                'movement_id' => 2,
                'user_id' => 1,
                'value' => 100.0,
            ),
            15 => 
            array (
                'date' => '2021-01-01 00:00:00',
                'id' => 16,
                'movement_id' => 2,
                'user_id' => 2,
                'value' => 120.0,
            ),
            16 => 
            array (
                'date' => '2021-01-01 00:00:00',
                'id' => 17,
                'movement_id' => 2,
                'user_id' => 3,
                'value' => 120.0,
            ),
        ));
        
        
    }
}