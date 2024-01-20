<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //? Basicamente en este archivo es como si fuera el generarRegistros de php, vamos a utilizar el faker que aqui se llama fake().

            'nombre' => fake() -> firstName(), 
            'apellidos' => fake() -> lastName(),
            'telefono' => fake() -> unique() -> mobileNumber(), //todo Este campo no se puede volver a repetr
            'email' => fake() -> unique() -> email(), //todo Este campo no se puede volver a repetir
            'direccion' => fake() -> address()
        ];
    }
}
