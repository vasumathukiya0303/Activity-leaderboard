<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class ActivityUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'full_name'=>'Henry Richard'
            ],
            [
                'full_name'=>'John Roy'
            ],
            [
                'full_name'=>'Peter Summi'
            ],
            [
                'full_name'=>'Maria Heil'
            ],
            [
                'full_name'=>'Jeny Tichard'
            ],
            [
                'full_name'=>'Sam Peterson'
            ],
            [
                'full_name'=>'Dan Braion'
            ],
            [
                'full_name'=>'Wicharn Jackson'
            ]
        ];

        /*** To insert data on users table ***/
        foreach($users as $user){
            User::create($user);
        }
    }
}
