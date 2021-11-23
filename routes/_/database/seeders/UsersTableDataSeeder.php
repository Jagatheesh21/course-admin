<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
                'id' => 1,
                'name' => "Admin",
                'email' => 'admin@gmail.com',
                'password' => Hash::make('Skyline@123'),
                'user_group_id' => 1

            ]);


    }
}
