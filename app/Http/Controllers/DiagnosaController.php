<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use App\Models\Penyakit;
use App\Models\RiwayatDiagnosa;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DiagnosaController extends Controller
{
    public function index()
    {
        // Mengambil kode dan nama gejala dari database
        $gejala = Gejala::orderBy('kode')
            ->pluck('nama', 'kode');

        return view('diagnosa', compact('gejala'));
    }

    public function proses(Request $request)
    {
        // Memastikan pengguna memilih minimal satu gejala
        $request->validate([
            'gejala' => ['required', 'array', 'min:1'],
            'gejala.*' => [
                'required',
                Rule::exists('gejala', 'kode'),
            ],
        ]);

        $dipilihKode = $request->input('gejala');

        // Mengambil semua penyakit beserta aturan dan gejalanya
        $daftarPenyakit = Penyakit::with('aturan.gejala')->get();

        $daftarHasil = [];

        foreach ($daftarPenyakit as $penyakit) {
            $cfCombine = 0;

            // Aturan dikelompokkan berdasarkan kode gejala
            $aturanByKode = $penyakit->aturan->keyBy(
                fn ($aturan) => $aturan->gejala->kode
            );

            // Hitung seluruh gejala yang relevan terlebih dahulu
            foreach ($dipilihKode as $kodeUser) {
                if (!$aturanByKode->has($kodeUser)) {
                    continue;
                }

                $cfGejala = (float) $aturanByKode
                    ->get($kodeUser)
                    ->bobot_cf;

                $cfCombine = $this->gabungkanCf(
                    $cfCombine,
                    $cfGejala
                );
            }

            // Hitung jumlah gejala yang tidak relevan
            $jumlahTidakRelevan = collect($dipilihKode)
                ->reject(
                    fn ($kodeUser) =>
                    $aturanByKode->has($kodeUser)
                )
                ->count();

            // Setiap gejala tidak relevan diberi penalti -0.15
            for ($i = 0; $i < $jumlahTidakRelevan; $i++) {
                $cfCombine = $this->gabungkanCf(
                    $cfCombine,
                    -0.15
                );
            }

            // Nilai dibatasi antara 0 sampai 100 persen
            $persen = round(
                max(0, min(1, $cfCombine)) * 100,
                1
            );

            $daftarHasil[] = [
                'nama' => $penyakit->nama,
                'keyakinan' => $persen,
                'deskripsi' => $penyakit->deskripsi,
                'penanganan' => $penyakit->penanganan ?? [],
            ];
        }

        // Mengurutkan hasil dari nilai tertinggi
        usort(
            $daftarHasil,
            fn ($a, $b) =>
            $b['keyakinan'] <=> $a['keyakinan']
        );

        // Mengambil nama gejala yang dipilih
        $namaGejala = Gejala::whereIn('kode', $dipilihKode)
            ->pluck('nama', 'kode');

        $dipilih = collect($dipilihKode)
            ->map(
                fn ($kode) =>
                $namaGejala[$kode] ?? $kode
            )
                ->all();
                RiwayatDiagnosa::create([
                    'user_id' => $request->user()?->id,
                    'hasil_penyakit' => $daftarHasil[0]['nama'],
                    'nilai_keyakinan' => $daftarHasil[0]['keyakinan'],
                    'gejala_dipilih' => $dipilih,
                    'diagnosis_alternatif' => array_slice($daftarHasil, 1),
                ]);

        return view('hasil', [
            'hasilUtama' => $daftarHasil[0],
            'alternatif' => array_slice($daftarHasil, 1),
            'dipilih' => $dipilih,
        ]);
    }

    private function gabungkanCf(
        float $cfLama,
        float $cfBaru
    ): float {
        // Kedua nilai positif
        if ($cfLama >= 0 && $cfBaru >= 0) {
            return $cfLama
                + $cfBaru * (1 - $cfLama);
        }

        // Kedua nilai negatif
        if ($cfLama < 0 && $cfBaru < 0) {
            return $cfLama
                + $cfBaru * (1 + $cfLama);
        }

        // Nilai berbeda tanda
        $pembagi = 1 - min(
            abs($cfLama),
            abs($cfBaru)
        );

        if ($pembagi == 0) {
            return 0;
        }

        return ($cfLama + $cfBaru) / $pembagi;
    }
}
