<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Satuan>
 */
class SatuanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $satuans = ['layanan', 'dokumen', 'kegiatan', 'laporan', 'orang', 'orang/K/L', 'unit kerja', 'rekomendasi'];
        static $count = 0;
        return [
            'name' => $satuans[$count++],
        ];
    }
}
