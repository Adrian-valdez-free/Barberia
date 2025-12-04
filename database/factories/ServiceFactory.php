<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
       $servicios = [
            'Corte Clásico',
            'Corte Fade / Degradado',
            'Afeitado con Navaja',
            'Perfilado de Barba',
            'Corte + Barba (Combo)',
            'Mascarilla Negra',
            'Corte Infantil',
            'Tinte de Barba',
            'Corte y Peinado',
        ];

        return [
            'name' => $this->faker->randomElement($servicios),
            'description' => $this->faker->sentence(6), // Una descripción corta
            'price' => $this->faker->randomElement([150, 200, 250, 300, 350, 400, 500]), // Precios cerrados se ven mejor
            'duration_minutes' => $this->faker->randomElement([15, 30, 45, 60, 90]), // Tiempos lógicos de agenda
            'is_active' => $this->faker->boolean(90), // El 90% estarán activos (true)
        ];
    }
}
