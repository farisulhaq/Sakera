<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\KegiatanRole>
 */
class KegiatanRoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $kode = ['4715', '4718', '4719', '6212', '6213', '6214', '6212.FAL.003'];
        $kegiatanRole = ['Pengelolaan Keuangan, BMN, dan Umum', 'Pengelolaan Komunikasi dan Informasi Publik', 'Pengelolaan Organisasi dan SDM', 'Komunikasi, Edukasi dan Standardisasi', 'Monev Perbendaharaan, Kekayaan Negara, dan Risiko', 'Pengelolaan Kas dan Pembiayaan Negara', 'Penyelenggaraan Akuntansi dan Pelaporan Keuangan Negara'];
        static $count = 0;

        return [
            'kode' => $kode[$count],
            'name' => $kegiatanRole[$count++],
        ];
    }
}
