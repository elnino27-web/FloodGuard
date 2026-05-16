# 🌊 FloodGuard: Sistem Penentuan Tingkat Kerawanan Banjir Berbasis Logika Fuzzy Mamdani

[![Laravel Version](https://img.shields.io/badge/Laravel-v10.x-FF2D20?logo=laravel&logoColor=white)](https://laravel.com)
[![TailwindCSS](https://img.shields.io/badge/TailwindCSS-v3.x-06B6D4?logo=tailwindcss&logoColor=white)](https://tailwindcss.com)
[![PHP Version](https://img.shields.io/badge/PHP-v8.x-777BB4?logo=php&logoColor=white)](https://php.net)
[![License](https://img.shields.io/badge/License-MIT-emerald.svg)](LICENSE)

**FloodGuard** adalah aplikasi sistem pendukung keputusan (SPK) berbasis web yang dikembangkan untuk memetakan dan menentukan tingkat kerawanan banjir secara dinamis pada daerah aliran hilir waduk (Studi Kasus: **Waduk Tunggu Pampang**). 

Sistem ini menggantikan pendekatan variabel statis konvensional dengan mengintegrasikan tiga parameter hidrologi real-time yang fluktuatif menggunakan **Metode Fuzzy Inference System (FIS) Mamdani**. Melalui 27 basis aturan keputusan pakar, aplikasi ini mampu mentransformasikan data numerik mentah menjadi informasi status kebencanaan yang intuitif bagi masyarakat umum maupun pemangku kebijakan (BPBD & BBWS).

---

## 🚀 Fitur Utama Sistem

* **Pemrosesan Variabel Hidrologi Dinamis:** Menganalisis parameter Tinggi Muka Air (TMA) waduk, Tingkat Curah Hujan, dan Durasi Hujan secara simultan.
* **Mesin Inferensi Fuzzy Kompleks:** Mengimplementasikan fungsi keanggotaan kurva segitiga (*trimf*) dan trapesium (*trapmf*), penalaran implikasi **MIN-MAX**, serta defuzzifikasi dengan metode **Centroid (Titik Berat)**.
* **Antarmuka Mobile-First Ultra-Responsive:** Didesain menggunakan Tailwind CSS modern yang menjamin kenyamanan pengoperasian penuh via *smartphone* (Thumb-Friendly UI).
* **Klasifikasi Status Kebencanaan Standar Nasional:** Menghasilkan output informasi keputusan berupa 4 kategori linguistik: **AMAN**, **WASPADA**, **SIAGA**, dan **AWAS**.

---

## 📸 Dokumentasi Antarmuka Aplikasi (Tampilan Mobile)

Sistem telah dioptimalkan secara visual agar bersahabat bagi pengguna seluler tanpa merusak tata letak komponen estetisnya:

### 1. Halaman Beranda (Landing Page)
Menampilkan identitas utama aplikasi, deskripsi fungsi deteksi dini, lencana sub-sistem, serta akses cepat menuju mesin kalkulator fuzzy.
<p align="center">
  <img src="UI/Cuplikan layar 2026-05-16 220717.jpg" width="310" alt="Halaman Beranda FloodGuard Mobile">
</p>

### 2. Form Input Parameter Observasi
Antarmuka interaktif yang dilengkapi efek *focus-glowing* untuk memasukkan parameter Tinggi Muka Air (Meter), Curah Hujan (mm), dan Durasi Hujan (Jam).
<p align="center">
  <img src="UI/Cuplikan layar 2026-05-16 220740.jpg" width="310" alt="Form Input Parameter FloodGuard Mobile">
</p>

### 3. Dashboard Hasil Analisis (Output)
Menampilkan skor kristal hasil defuzzifikasi centroid beserta panel gradien warna dinamis, ikon representasi status, kartu rincian observasi, dan penjelasan ringkas metode.
<p align="center">
  <img src="UI/Cuplikan layar 2026-05-16 220807.jpg" width="310" alt="Halaman Hasil Analisis FloodGuard Mobile">
</p>

---

## 📐 Pemodelan Sistem Berdasarkan Parameter Jurnal

Pemetaan fungsi keanggotaan variabel masukan dan luaran disusun berdasarkan profil teknis hidrologi **Waduk Tunggu Pampang (BBWS Pompengan)** dan standar intensitas **BMKG**:

### Batasan Domain Variabel Input & Output
1. **Tinggi Muka Air (TMA) Waduk**:
   * *Rendah* : -3.0 s.d 1.5 Meter
   * *Normal* : 1.0 s.d 4.0 Meter
   * *Tinggi* : 3.5 s.d 5.5 Meter
2. **Intensitas Curah Hujan**:
   * *Ringan* : 0 s.d 5 mm
   * *Sedang* : 4 s.d 25 mm
   * *Deras* : 20 s.d 50 mm
3. **Durasi Terjadinya Hujan**:
   * *Singkat* : 0 s.d 0.2 Jam
   * *Sedang* : 0.15 s.d 0.7 Jam
   * *Lama* : 0.6 s.d 2.0 Jam
4. **Tingkat Kerawanan Banjir (Output)**:
   * *Aman* ($0 \le Z \le 25$), *Waspada* ($26 \le Z \le 50$), *Siaga* ($51 \le Z \le 75$), *Awas* ($76 \le Z \le 100$).

### Total Aturan Pakar (Rule Base)
Sistem mengevaluasi secara simultan kombinasi dari matriks aturan hidrologi ($3 \times 3 \times 3 = \mathbf{27\ Aturan}$ aktif).
* *Contoh Aturan:* **IF** TMA Waduk *Tinggi* **AND** Curah Hujan *Deras* **AND** Durasi Hujan *Lama* **THEN** Tingkat Kerawanan *Awas*.

---

## 🛠️ Langkah Instalasi di Lingkungan Lokal

Ikuti petunjuk di bawah ini untuk menjalankan repositori proyek ini pada komputer lokal Anda:

### 1. Prasyarat Sistem
* PHP $\ge$ 8.1
* Composer
* Web Server (XAMPP / Laragon / Laravel Herd)
* MySQL / MariaDB

### 2. Proses Kloning dan Instalasi Vendor
```bash
# Kloning repositori ini
git clone [https://github.com/username/floodguard.git](https://github.com/username/floodguard.git)

# Masuk ke direktori proyek
cd floodguard

# Instalasi dependensi PHP pihak ketiga via Composer
composer install
