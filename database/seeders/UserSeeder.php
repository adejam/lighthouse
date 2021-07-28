<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(array(
            0 => array(
                'id' => 1,
                'name' => 'Adeleye',
                'email' => 'adejam@gmail.com',
                'password' => Hash::make('mmmmmmmm'),
                'email_verified_at' => now(),
            ),
            1 => array(
                'id' => 2,
                'name' => 'Seun',
                'email' => 'costa@gmail.com',
                'password' => Hash::make('mmmmmmmm'),
                'email_verified_at' => now(),
            ),
            2 => array(
                'id' => 3,
                'name' => 'Hafsoh',
                'email' => 'hafshit@gmail.com',
                'password' => Hash::make('mmmmmmmm'),
                'email_verified_at' => now(),
            ),
            3 => array(
                'id' => 4,
                'name' => 'basit',
                'email' => 'basituta@gmail.com',
                'password' => Hash::make('mmmmmmmm'),
                'email_verified_at' => now(),
            ),
            4 => array(
                'id' => 5,
                'name' => 'Abu',
                'email' => 'aburidwan@gmail.com',
                'password' => Hash::make('mmmmmmmm'),
                'email_verified_at' => now(),
            ),
            5 => array(
                'id' => 6,
                'name' => 'Abu',
                'email' => 'aburahman@gmail.com',
                'password' => Hash::make('mmmmmmmm'),
                'email_verified_at' => now(),
            ),
        ));
    }
}
