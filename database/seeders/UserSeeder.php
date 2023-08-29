<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'email' => 'rafie.luartes.twph@gmail.com',
            'user_level' => '1',
            'password' => Hash::make('asdf1234')
        ]);
        DB::table('employee')->insert([
            'user_id' => DB::getPdo()->lastInsertId(),
            'first_name' => 'Rafie',
            'middle_initial' => 'T',
            'last_name' => 'Luartes',
            'salary' => '9000'
        ]);

        DB::table('users')->insert([
            'email' => 'songjane@exmail.co',
            'user_level' => '3',
            'password' => Hash::make('sin6in6i$myTaLent')
        ]);
        DB::table('employee')->insert([
            'user_id' => DB::getPdo()->lastInsertId(),
            'first_name' => 'Jane',
            'middle_initial' => 'A',
            'last_name' => 'Song',
            'salary' => '15000'
        ]);

        DB::table('users')->insert([
            'email' => 'vincevice@exmail.co',
            'user_level' => '4',
            'password' => Hash::make('vinc3v1c3$')
        ]);
        DB::table('employee')->insert([
            'user_id' => DB::getPdo()->lastInsertId(),
            'first_name' => 'Vincent',
            'middle_initial' => 'H',
            'last_name' => 'Viceral',
            'salary' => '25000'
        ]);

        DB::table('users')->insert([
            'email' => 'ald_rech@exmail.co',
            'user_level' => '5',
            'password' => Hash::make('StackLangNangStack!_000')
        ]);
        DB::table('employee')->insert([
            'user_id' => DB::getPdo()->lastInsertId(),
            'first_name' => 'Aldous',
            'middle_initial' => 'B',
            'last_name' => 'Recharge',
            'salary' => '50000'
        ]);

        DB::table('users')->insert([
            'email' => '25ccc@exmail.co',
            'user_level' => '6',
            'password' => Hash::make('DrakeIsBetterThanMe_100')
        ]);
        DB::table('employee')->insert([
            'user_id' => DB::getPdo()->lastInsertId(),
            'first_name' => 'John',
            'middle_initial' => 'R',
            'last_name' => 'Fausto',
            'salary' => '20000'
        ]);
    }
}
