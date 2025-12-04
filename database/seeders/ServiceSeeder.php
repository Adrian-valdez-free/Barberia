<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services =[
            [
                'name' => 'Corte de pelo',
                'description' => 'Corte de pelo para cabarello y dama',
                'price' => '250',
                'duration_minutes' => '30',
                'is_active' => '1',
            ],
            [
                'name' => 'Corte de barbara',
                'description' => 'Corte de barba para caballeros',
                'price' => '200',
                'duration_minutes' => '30',
                'is_active' => '1',
            ],
            [
                'name' => 'Depilacion laser',
                'description' => 'Depilacion para todo parte del cuerpo',
                'price' => '500',
                'duration_minutes' => '60',
                'is_active' => '1',
            ],
            ];
            foreach($services as $datos){
                Service::factory()->create([
                'name'      => $datos['name'],
                'description'     => $datos['description'],
                'price'     => $datos['price'],
                'duration_minutes' => $datos['duration_minutes'],
                'is_active' => $datos['is_active'],
                ]);
            }
    }
}
