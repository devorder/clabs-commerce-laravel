<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                [
                    'name' => 'John Doe',
                    'email' => 'john.doe@gmail.com',
                    'password' => Hash::make(12345)
                ],
                [
                    'name' => 'jane Doe',
                    'email' => 'jane.doe@gmail.com',
                    'password' => Hash::make(12345)
                ]
            ]
        );
    }
}
