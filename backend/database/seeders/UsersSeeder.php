<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         User::factory()->create([
        'name' => 'Admin',
        'email' => 'admin@admin.com',
        'password' => bcrypt('admin'),
        'role' => 'admin',
        'is_approved' => true,
    ]);

    User::factory()->create([
        'name' => 'Oficina',
        'email' => 'oficina@oficina.com',
        'password' => bcrypt('oficina'),
        'role' => 'oficina',
        'is_approved' => true,
    ]);

    User::factory()->create([
        'name' => 'Seguradora',
        'email' => 'seguradora@seguradora.com',
        'password' => bcrypt('seguradora'),
        'role' => 'seguradora',
        'is_approved' => true,
    ]);

    User::factory()->create([
        'name' => 'Regulador',
        'email' => 'regulador@regulador.com',
        'password' => bcrypt('regulador'),
        'role' => 'regulador',
        'is_approved' => true,
    ]);

     User::factory()->create([
        'name' => 'Regulador2',
        'email' => 'regulador2@regulador.com',
        'password' => bcrypt('regulador'),
        'role' => 'regulador',
        'is_approved' => false,
    ]);
    }
}
