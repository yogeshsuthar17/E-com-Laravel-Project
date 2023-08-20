<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'mobile' => '9876543211',
            'email' => 'admin@example.com',
            'profile' => 'admin',
            'password' => bcrypt('password'),
        ]);
    }
}
