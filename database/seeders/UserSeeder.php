<?php

namespace Database\Seeders;


namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Jose Adrian',
            'email' => 'joseadmin@gmail.com',
            'password' => bcrypt('123456789'),
            'id_number' => '1234567890',
            'phone' => '9999999999',
            'address' => 'Calle 46 Juanpablo andy adonay'
        ])->assignRole('Administrador');
    }
}
