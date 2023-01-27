<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Role>
 */
class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $seksies = ['umum', 'mski', 'bank', 'vera', 'pencairan dana'];
        static $count = 0;
        return [
            'name' => $seksies[$count++],
        ];
    }
}
