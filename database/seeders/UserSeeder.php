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
        $user = User::create([
            'email' => 'main@mail.com',
            'user_level' => '1',
            'password' => Hash::make('asd123')
        ]);
        Employee::create([
            'id' => $user->id,
            'first_name' => 'admin',
            'middle_name' => 'x',
            'last_name' => 'x',
            'date_of_birth' => '0001-01-01',
            'salary' => '999999'
        ]);
    }
}
