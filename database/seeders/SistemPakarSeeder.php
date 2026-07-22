<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SistemPakarSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Memasukkan data gejala

        $gejala = [
            ['kode' => 'G01', 'nama' => 'Gatal berlebihan'],
            ['kode' => 'G02', 'nama' => 'Sering menggaruk area tertentu'],
            ['kode' => 'G03', 'nama' => 'Terdapat luka atau keropeng'],
            ['kode' => 'G04', 'nama' => 'Kulit kemerahan atau iritasi'],
            ['kode' => 'G05', 'nama' => 'Bulu rontok membentuk pola tertentu'],
            ['kode' => 'G06', 'nama' => 'Kulit bersisik atau berketombe'],
            ['kode' => 'G07', 'nama' => 'Rambut menipis'],
            ['kode' => 'G08', 'nama' => 'Kulit berbau tidak sedap'],
            ['kode' => 'G09', 'nama' => 'Kulit tampak lembab atau bernanah'],
            ['kode' => 'G10', 'nama' => 'Kucing sering menjilat area tertentu'],
        ];

        foreach ($gejala as $item) {
            DB::table('gejala')->updateOrInsert(
                ['kode' => $item['kode']],
                [
                    'nama' => $item['nama'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }

        // 2. Memasukkan data penyakit
        $penyakit = [
            [
                'kode' => 'P01',
                'nama' => 'Scabies (Kudis Kucing)',
                'deskripsi' => 'Penyakit akibat tungau yang menyebabkan gatal ekstrem, luka, keropeng, dan kebotakan.',
                'penanganan' => [
                    'Isolasi kucing segera',
                    'Gunakan sampo anti-tungau',
                    'Bersihkan dan disinfeksi kandang',
                    'Konsultasikan dengan dokter hewan',
                ],
            ],
            [
                'kode' => 'P02',
                'nama' => 'Dermatitis Alergi',
                'deskripsi' => 'Reaksi alergi terhadap lingkungan, kutu, makanan, atau bahan tertentu.',
                'penanganan' => [
                    'Identifikasi dan hindari pemicu alergi',
                    'Gunakan obat sesuai anjuran dokter hewan',
                    'Gunakan produk perawatan khusus hewan',
                    'Pertimbangkan pakan hypoallergenic',
                ],
            ],
            [
                'kode' => 'P03',
                'nama' => 'Jamur Kulit (Ringworm)',
                'deskripsi' => 'Infeksi jamur yang menyebabkan bulu rontok berpola, kulit bersisik, dan dapat menular.',
                'penanganan' => [
                    'Pisahkan kucing dari hewan lain',
                    'Gunakan obat antijamur',
                    'Jaga area kulit tetap kering',
                    'Sterilisasi kandang dan lingkungan',
                ],
            ],
            [
                'kode' => 'P04',
                'nama' => 'Infeksi Bakteri (Pioderma)',
                'deskripsi' => 'Infeksi bakteri pada kulit yang dapat menyebabkan kemerahan, bau, kelembapan, dan nanah.',
                'penanganan' => [
                    'Bersihkan area dengan antiseptik khusus hewan',
                    'Jangan memencet luka',
                    'Gunakan obat sesuai anjuran dokter hewan',
                    'Bawa ke klinik apabila kondisinya parah',
                ],
            ],
            [
                'kode' => 'P05',
                'nama' => 'Kutu / Parasit Kulit',
                'deskripsi' => 'Gangguan kulit akibat kutu atau parasit yang menyebabkan gatal dan garukan terus-menerus.',
                'penanganan' => [
                    'Gunakan obat tetes kutu',
                    'Mandikan dengan sampo khusus kucing',
                    'Sisir bulu dengan sisir kutu',
                    'Bersihkan tempat tidur dan lingkungan kucing',
                ],
            ],
        ];

        foreach ($penyakit as $item) {
            DB::table('penyakit')->updateOrInsert(
                ['kode' => $item['kode']],
                [
                    'nama' => $item['nama'],
                    'deskripsi' => $item['deskripsi'],
                    'penanganan' => json_encode(
                        $item['penanganan'],
                        JSON_UNESCAPED_UNICODE
                    ),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }

        // 3. Memasukkan hubungan penyakit, gejala, dan bobot CF
        $aturan = [
            // Scabies
            ['penyakit' => 'P01', 'gejala' => 'G01', 'bobot' => 0.80],
            ['penyakit' => 'P01', 'gejala' => 'G02', 'bobot' => 0.60],
            ['penyakit' => 'P01', 'gejala' => 'G03', 'bobot' => 0.60],

            // Dermatitis Alergi
            ['penyakit' => 'P02', 'gejala' => 'G01', 'bobot' => 0.70],
            ['penyakit' => 'P02', 'gejala' => 'G04', 'bobot' => 0.75],
            ['penyakit' => 'P02', 'gejala' => 'G10', 'bobot' => 0.60],

            // Ringworm
            ['penyakit' => 'P03', 'gejala' => 'G05', 'bobot' => 0.85],
            ['penyakit' => 'P03', 'gejala' => 'G06', 'bobot' => 0.60],
            ['penyakit' => 'P03', 'gejala' => 'G07', 'bobot' => 0.50],

            // Pioderma
            ['penyakit' => 'P04', 'gejala' => 'G09', 'bobot' => 0.85],
            ['penyakit' => 'P04', 'gejala' => 'G04', 'bobot' => 0.50],
            ['penyakit' => 'P04', 'gejala' => 'G08', 'bobot' => 0.70],

            // Kutu / Parasit
            ['penyakit' => 'P05', 'gejala' => 'G02', 'bobot' => 0.80],
            ['penyakit' => 'P05', 'gejala' => 'G01', 'bobot' => 0.60],
            ['penyakit' => 'P05', 'gejala' => 'G03', 'bobot' => 0.50],
        ];

        foreach ($aturan as $item) {
            $penyakitId = DB::table('penyakit')
                ->where('kode', $item['penyakit'])
                ->value('id');

            $gejalaId = DB::table('gejala')
                ->where('kode', $item['gejala'])
                ->value('id');

            DB::table('aturan')->updateOrInsert(
                [
                    'penyakit_id' => $penyakitId,
                    'gejala_id' => $gejalaId,
                ],
                [
                    'bobot_cf' => $item['bobot'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
