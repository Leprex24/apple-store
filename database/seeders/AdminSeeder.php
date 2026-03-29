<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'admin@apple-store.test',
            'password' => bcrypt('admin123'),
            'is_admin' => true,
        ]);

        \App\Models\User::create([
            'name' => 'Uzytkownik Testowy',
            'email' => 'testowy@test.pl',
            'password' => bcrypt('p@ssw0rd'),
            'is_admin' => false,
        ]);
    }
}
