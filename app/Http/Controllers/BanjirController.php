<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BanjirController extends Controller
{
    public function index()
    {
        return view('input');
    }

    public function hitung(Request $request)
    {
        // 1. Validasi & Ambil Input
        $request->validate([
            'tma' => 'required|numeric',
            'curah_hujan' => 'required|numeric|min:0',
            'durasi' => 'required|numeric|min:0',
        ]);

        $tma = $request->input('tma');
        $ch  = $request->input('curah_hujan');
        $dur = $request->input('durasi');

        // 2. FUZZIFIKASI - Menghitung Derajat Keanggotaan (mu)
        $muTma = [
            'rendah' => $this->kurvaTrapesium($tma, -999, -999, 0.5, 1.5),
            'normal' => $this->kurvaSegitiga($tma, 1.0, 2.5, 4.0),
            'tinggi' => $this->kurvaTrapesium($tma, 3.5, 5, 999, 999),
        ];

        $muCh = [
            'ringan' => $this->kurvaTrapesium($ch, -999, -999, 2, 5),
            'sedang' => $this->kurvaSegitiga($ch, 4, 12, 25),
            'deras'  => $this->kurvaTrapesium($ch, 20, 30, 999, 999),
        ];

        $muDur = [
            'singkat' => $this->kurvaTrapesium($dur, -999, -999, 0.1, 0.2),
            'sedang'  => $this->kurvaSegitiga($dur, 0.15, 0.4, 0.7),
            'lama'    => $this->kurvaTrapesium($dur, 0.6, 1.6, 999, 999),
        ];

        // 3. INFERENSI - Evaluasi 27 Aturan (Rule Base)
        $alpha = [];

        $alpha[1] = min($muTma['rendah'], $muCh['ringan'], $muDur['singkat']);
        $alpha[2] = min($muTma['rendah'], $muCh['sedang'], $muDur['singkat']);
        $alpha[3] = min($muTma['rendah'], $muCh['deras'],  $muDur['singkat']);
        $alpha[4] = min($muTma['normal'], $muCh['ringan'], $muDur['singkat']);
        $alpha[5] = min($muTma['normal'], $muCh['sedang'], $muDur['singkat']);
        $alpha[6] = min($muTma['normal'], $muCh['deras'],  $muDur['singkat']);
        $alpha[7] = min($muTma['tinggi'], $muCh['ringan'], $muDur['singkat']);
        $alpha[8] = min($muTma['tinggi'], $muCh['sedang'], $muDur['singkat']);
        $alpha[9] = min($muTma['tinggi'], $muCh['deras'],  $muDur['singkat']);
        $alpha[10] = min($muTma['rendah'], $muCh['ringan'], $muDur['sedang']);
        $alpha[11] = min($muTma['rendah'], $muCh['sedang'], $muDur['sedang']);
        $alpha[12] = min($muTma['rendah'], $muCh['deras'],  $muDur['sedang']);
        $alpha[13] = min($muTma['normal'], $muCh['ringan'], $muDur['sedang']);
        $alpha[14] = min($muTma['normal'], $muCh['sedang'], $muDur['sedang']);
        $alpha[15] = min($muTma['normal'], $muCh['deras'],  $muDur['sedang']);
        $alpha[16] = min($muTma['tinggi'], $muCh['ringan'], $muDur['sedang']);
        $alpha[17] = min($muTma['tinggi'], $muCh['sedang'], $muDur['sedang']);
        $alpha[18] = min($muTma['tinggi'], $muCh['deras'],  $muDur['sedang']);
        $alpha[19] = min($muTma['rendah'], $muCh['ringan'], $muDur['lama']);
        $alpha[20] = min($muTma['rendah'], $muCh['sedang'], $muDur['lama']);
        $alpha[21] = min($muTma['rendah'], $muCh['deras'],  $muDur['lama']);
        $alpha[22] = min($muTma['normal'], $muCh['ringan'], $muDur['lama']);
        $alpha[23] = min($muTma['normal'], $muCh['sedang'], $muDur['lama']);
        $alpha[24] = min($muTma['normal'], $muCh['deras'],  $muDur['lama']);
        $alpha[25] = min($muTma['tinggi'], $muCh['ringan'], $muDur['lama']);
        $alpha[26] = min($muTma['tinggi'], $muCh['sedang'], $muDur['lama']);
        $alpha[27] = min($muTma['tinggi'], $muCh['deras'],  $muDur['lama']);

        // 4. AGREGASI (Metode MAX)
        $max_aman    = max($alpha[1], $alpha[2], $alpha[4], $alpha[10]);
        $max_waspada = max($alpha[3], $alpha[5], $alpha[6], $alpha[7], $alpha[8], $alpha[11], $alpha[12], $alpha[13], $alpha[14], $alpha[16], $alpha[19], $alpha[20], $alpha[22]);
        $max_siaga   = max($alpha[9], $alpha[15], $alpha[17], $alpha[21], $alpha[23], $alpha[25]);
        $max_awas    = max($alpha[18], $alpha[24], $alpha[26], $alpha[27]);

        // 5. DEFUZZIFIKASI (Metode Centroid / Titik Berat)
        $numerator = 0;
        $denominator = 0;

        for ($z = 0; $z <= 100; $z++) {
            // Menyesuaikan dengan parameter BNPB / BBWS (trapmf & trimf)
            $mu_aman    = min($max_aman,    $this->kurvaTrapesium($z, 0, 0, 15, 25));
            $mu_waspada = min($max_waspada, $this->kurvaSegitiga($z, 20, 35, 50));
            $mu_siaga   = min($max_siaga,   $this->kurvaSegitiga($z, 45, 65, 80));
            $mu_awas    = min($max_awas,    $this->kurvaTrapesium($z, 75, 85, 100, 100));

            // Ambil area gabungan (titik tertinggi dari irisan kurva)
            $mu_total = max($mu_aman, $mu_waspada, $mu_siaga, $mu_awas);

            // Rumus integral diskrit: Sum(Titik * Mu) / Sum(Mu)
            $numerator += ($z * $mu_total);
            $denominator += $mu_total;
        }

        // Skor akhir tegas (Crisp Value)
        $skor = ($denominator > 0) ? ($numerator / $denominator) : 0;

        // 6. KLASIFIKASI OUTPUT BERDASARKAN SKOR
        if ($skor <= 25) {
            $status = "Aman";
        } elseif ($skor <= 50) {
            $status = "Waspada";
        } elseif ($skor <= 75) {
            $status = "Siaga";
        } else {
            $status = "Awas";
        }

        // Return ke view
        return view('hasil', [
            'tma' => $tma,
            'ch' => $ch,
            'dur' => $dur,
            'skor' => number_format($skor, 2),
            'status' => $status,
            'muTma' => $muTma,
            'muCh' => $muCh,
            'muDur' => $muDur
        ]);
    }

    // --- FUNGSI HELPER KURVA KEANGGOTAAN ---

    private function kurvaTrapesium($x, $a, $b, $c, $d) {
        // Area luar
        if ($x <= $a || $x >= $d) return 0;
        // Puncak datar (Core)
        if ($x >= $b && $x <= $c) return 1;

        // Garis miring naik (diberi pengaman division by zero)
        if ($x > $a && $x < $b && $a != $b) {
            return ($x - $a) / ($b - $a);
        }

        // Garis miring turun (diberi pengaman division by zero)
        if ($x > $c && $x < $d && $c != $d) {
            return ($d - $x) / ($d - $c);
        }

        return 0;
    }

    private function kurvaSegitiga($x, $a, $b, $c) {
        if ($x <= $a || $x >= $c) return 0;
        if ($x == $b) return 1;
        if ($x > $a && $x < $b && $a != $b) return ($x - $a) / ($b - $a);
        if ($x > $b && $x < $c && $b != $c) return ($c - $x) / ($c - $b);

        return 0;
    }
}
