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
       $usuarios = [
        [
            'name' => 'Santiago',
            'email' => 'santi@gmail.com',
            'phone' => '9991111111',
            'id_number' => '0000000001',
            'role' => 'Administrador'
        ],
        [
            'name' => 'Simon',
            'email' => 'simon@gmail.com',
            'phone' => '9992222222',
            'id_number' => '0000000002',
            'role' => 'Barberos'

        ],
        [
            'name' => 'Homero',
            'email' => 'homero@gmail.com',
            'phone' => '9993333333',
            'id_number' => '0000000003',
            'role' => 'Recepcionista'
        ],
    ];

    foreach($usuarios as $datos){
        User::factory()->create([
            'name'      => $datos['name'],
            'email'     => $datos['email'],
            'phone'     => $datos['phone'],
            'id_number' => $datos['id_number'],
            'address'   => 'Calle Conocida # ' . rand(1, 100), // Dirección semi-aleatoria
            'password'  => bcrypt('123456789'),
        ])->assignRole($datos['role']);
    }
    }
}
