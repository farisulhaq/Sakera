<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kegiatan>
 */
class KegiatanFactory extends Factory
{
    /**
     * Define the model"s default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $data = [1, 1, 2, "4715.EBA", "Layanan Dukungan Manajemen Internal[Base Line]", 3, 0, "2023", 1, 1, 2, "4715.EBA.001", "Kerumahtanggaan", 1, 71600000, "2023", 1, 1, 2, "4715.EBA.002", "Dukungan Pimpinan dan Keprotokoleran", 1, 15932000, "2023", 1, 1, 2, "4715.EBA.994", "Layanan Perkantoran", 1, 1364840000, "2023", 2, 1, 2, "4715.EBD", "Layanan Manajemen Kinerja Internal[Base Line]", 3, 10596000, "2023", 2, 1, 2, "4715.EBD.001", "Rencana Kerja dan Anggaran Unit", 1, 2400000, "2023", 2, 1, 2, "4715.EBD.003", "Dokumen Pengelolaan Kinerja Organisasi", 2, 8196000, "2023", 3, 2, 2, "4718.BMB", "Komunikasi Publik[Base Line]", 2, 10500000, "2023", 3, 2, 2, "4718.BMB.001", "Pembinaan/Edukasi Publik", 1, 3500000, "2023", 3, 2, 2, "4718.BMB.002", "Kehumasan", 1, 7000000, "2023", 1, 3, 2, "4719.EBA", "Layanan Dukungan Manajemen Internal[Base Line]", 3, 209904000, "2023", 4, 3, 2, "4719.EBA.004", "Hasil Survey/Rekomendasi Kepuasan Pengguna Layanan", 2, 2000000, "2023", 1, 3, 2, "4719.EBA.994", "Layanan Perkantoran", 1, 207904000, "2023", 5, 3, 2, "4719.EBC", "Layanan Manajemen SDM Internal[Base Line]", 18, 4664000, "2023", 5, 3, 2, "4719.EBC.001", "Pengembangan SDM", 18, 4664000, "2023", 5, 4, 3, "6212.FAC", "Peningkatan Kapasitas Aparatur Negara[Base Line]", 99, 0, "2023", 7, 4, 3, "6212.FAC.302", "Komunikasi dan Edukasi Implementasi Aplikasi (PU)", 99, 36020000, "2023", 3, 4, 3, "6212.FAL", "Pengelolaan Pelaksanaan Anggaran dan Pembiayaan [BaseLine]", 10, 0, "2023", 3, 4, 3, "6212.FAL.004", "Konsultasi Pencairan Dana", 10, 32372000, "2023", 6, 5, 3, "6213.FAC", "Pengelolaan Keuangan Negara[Base Line]", 4, 0, "2023", 5, 5, 3, "6213.FAC.001", "Monev Pengembangan Kompetensi KPA, PPK, PPSPM, Bendahara dan Pengelolaan Perbendaharaan", 4, 7824000, "2023", 2, 5, 3, "6213.FAL", "Pengelolaan Pelaksanaan Anggaran dan Pembiayaan[Base Line]", 2, 0, "2023", 2, 5, 3, "6213.FAL.003", "Reviu Belanja Pemerintah", 1, 5240000, "2023", 4, 5, 4, "4803.FAE", "Pemantauan dan Evaluasi serta Pelaporan[Base Line]", 2, 0, "2023", 8, 5, 4, "4803.FAE.001", "Rekomendasi atas Kinerja Investasi Pemerintah", 2, 4640000, "2023", 2, 5, 4, "6213.FAL", "Pengelolaan Pelaksanaan Anggaran dan Pembiayaan[Base Line]", 2, 0, "2023", 3, 5, 4, "6213.FAL.001", "Monev Penerimaan dan Pengeluaran Kas", 1, 5240000, "2023", 2, 6, 4, "6214.FAL", "Pengelolaan Pelaksanaan Anggaran dan Pembiayaan[Base Line]", 2377, 0, "2023", 2, 6, 4, "6214.FAL.001", "Koordinasi dan Rekonsiliasi Penerimaan dan Pengeluaran", 1, 2768000, "2023", 4, 4, 5, "6212.FAH", "Pengelolaan Keuangan Negaran [Base Line]", 4, 0, "2023", 4, 4, 5, "6212.FAL.001", "Edukasi Dalam Rangka Penyusunan Laporan Keuangan Tingkat Kuasa BUN", 4, 32560000, "2023", 4, 7, 5, "6212.FAL.004", "Pengelolaan Keuangan Negaran [Base Line]", 4, 0, "2023", 4, 7, 5, "6215.FAH.003", "Laporan Keuangan BUN", 4, 2000000, "2023", 2, 6, 6, "6214.FAL", "Pengelolaan Pelaksanaan Anggaran dan Pembiayaan[Base Line]", 2377, 0, "2023", 2, 6, 6, "6214.FAL.002", "Surat Perintah Pencairan/Penarikan/Repayment/Pengesahan Dana", 2376, 4000000, "2023"];
        static $count = 0;
        return [
            'satuan_id' => $data[$count++],
            'kegiatan_role_id' => $data[$count++],
            'role_id' => $data[$count++],
            'kode' => $data[$count++],
            'name' => $data[$count++],
            'target' => $data[$count++],
            'pagu' => $data[$count++],
            'tahun' => $data[$count++]
        ];
    }
}
