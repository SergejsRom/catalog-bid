<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Test',
            'email' => 'test@example.com',
            'password' => bcrypt('123')
        ]);
        $user = User::create([
            'name' => 'Test',
            'email' => 'aaa@bbb.com',
            'password' => bcrypt('123')
        ]);
    }
}
