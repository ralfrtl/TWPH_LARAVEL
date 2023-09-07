<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\User;
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
        User::create([
            'mail' => 'rafie.luartes.twph@gmail.com',
            'user_level' => '1',
            'password' => Hash::make('asdf1234')
        ]);
        Employee::create([
            'id' => DB::getPdo()->lastInsertId(),
            'first_name' => 'Rafie',
            'middle_name' => 'T',
            'last_name' => 'Luartes',
            'date_of_birth' => '1998-06-22',
            'salary' => '9000'
        ]);

        User::create([
            'mail' => 'songjane@exmail.co',
            'user_level' => '3',
            'password' => Hash::make('sin6in6i$myTaLent')
        ]);
        Employee::create([
            'id' => DB::getPdo()->lastInsertId(),
            'first_name' => 'Jane',
            'middle_name' => 'A',
            'last_name' => 'Song',
            'date_of_birth' => fake()->date,
            'salary' => '15000'
        ]);

        User::create([
            'mail' => 'vincevice@exmail.co',
            'user_level' => '4',
            'password' => Hash::make('vinc3v1c3$')
        ]);
        Employee::create([
            'id' => DB::getPdo()->lastInsertId(),
            'first_name' => 'Vincent',
            'middle_name' => 'H',
            'last_name' => 'Viceral',
            'date_of_birth' => fake()->date,
            'salary' => '25000'
        ]);

        User::create([
            'mail' => 'ald_rech@exmail.co',
            'user_level' => '5',
            'password' => Hash::make('StackLangNangStack!_000')
        ]);
        Employee::create([
            'id' => DB::getPdo()->lastInsertId(),
            'first_name' => 'Aldous',
            'middle_name' => 'B',
            'last_name' => 'Recharge',
            'date_of_birth' => fake()->date,
            'salary' => '50000'
        ]);

        User::create([
            'mail' => '25ccc@exmail.co',
            'user_level' => '6',
            'password' => Hash::make('DrakeIsBetterThanMe_100')
        ]);
        Employee::create([
            'id' => DB::getPdo()->lastInsertId(),
            'first_name' => 'John',
            'middle_name' => 'R',
            'last_name' => 'Fausto',
            'date_of_birth' => fake()->date,
            'salary' => '20000'
        ]);
    }
}
