<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserActivtiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $activities = [
            [
                'type' => 'walking',
                'user_id' => 1,
                'time' => '2024-10-27 08:05:20'
            ],
            [
                'type' => 'Running',
                'user_id' => 1,
                'time' => '2024-10-27 09:35:20'
            ],[
                'type' => 'Cycling',
                'user_id' => 1,
                'time' => '2024-10-27 10:15:20'
            ],[
                'type' => 'walking',
                'user_id' => 1,
                'time' => '2024-10-26 08:05:20'
            ],[
                'type' => 'Running',
                'user_id' => 2,
                'time' => '2024-10-27 08:05:20'
            ],[
                'type' => 'cycling',
                'user_id' => 2,
                'time' => '2024-10-26 12:05:20'
            ],[
                'type' => 'walking',
                'user_id' => 3,
                'time' => '2024-10-27 08:05:20'
            ],[
                'type' => 'Running',
                'user_id' => 3,
                'time' => '2024-10-25 18:35:20'
            ],[
                'type' => 'walking',
                'user_id' => 4,
                'time' => '2024-10-26 19:05:20'
            ],[
                'type' => 'Running',
                'user_id' => 4,
                'time' => '2024-10-25 19:35:20'
            ],[
                'type' => 'walking',
                'user_id' => 5,
                'time' => '2024-10-27 08:05:20'
            ],[
                'type' => 'cycling',
                'user_id' => 5,
                'time' => '2024-09-27 08:05:20'
            ],[
                'type' => 'Running',
                'user_id' => 5,
                'time' => '2023-02-01 08:05:20'
            ],[
                'type' => 'walking',
                'user_id' => 6,
                'time' => '2024-10-24 08:05:20'
            ],[
                'type' => 'walking',
                'user_id' => 6,
                'time' => '2024-10-26 08:05:20'
            ],[
                'type' => 'walking',
                'user_id' => 6,
                'time' => '2023-03-03 08:05:20'
            ],[
                'type' => 'walking',
                'user_id' => 7,
                'time' => '2024-10-25 08:05:20'
            ],[
                'type' => 'cycling',
                'user_id' => 7,
                'time' => '2024-10-26 08:05:20'
            ],[
                'type' => 'watching',
                'user_id' => 7,
                'time' => '2023-07-25 18:05:20'
            ],[
                'type' => 'Runing',
                'user_id' => 7,
                'time' => '2024-10-25 08:05:20'
            ],[
                'type' => 'walking',
                'user_id' => 8,
                'time' => '2024-10-27 08:05:20'
            ],[
                'type' => 'cycling',
                'user_id' => 8,
                'time' => '2024-10-26 18:05:20'
            ],[
                'type' => 'Running',
                'user_id' => 8,
                'time' => '2024-09-25 19:05:20'
            ]
        ];

        /*** To insert data on users table ***/
        foreach($activities as $activity){
            Activity::create($activity);
        }
    }
}
