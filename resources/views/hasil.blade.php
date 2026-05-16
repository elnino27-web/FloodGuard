<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Analisis - FloodGuard</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <style>
        /* CSS Khusus untuk Warna Status (Dipertahankan agar backend logic tetap berfungsi) */
        .Aman { background: linear-gradient(135deg, #10b981, #047857); }
        .Waspada { background: linear-gradient(135deg, #f59e0b, #b45309); }
        .Siaga { background: linear-gradient(135deg, #f97316, #c2410c); }
        .Awas { background: linear-gradient(135deg, #ef4444, #b91c1c); }

        /* Animasi Kustom */
        @keyframes float-bg {
            0% { transform: translateY(0px) scale(1); }
            100% { transform: translateY(-20px) scale(1.05); }
        }
        .animate-float-bg {
            animation: float-bg 8s ease-in-out infinite alternate;
        }

        @keyframes slideUpFade {
            from { opacity: 0; transform: translateY(40px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-slide-up {
            animation: slideUpFade 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        @keyframes float-content {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        .animate-float-content {
            animation: float-content 5s ease-in-out infinite;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-blue-50 to-sky-100 min-h-screen flex items-center justify-center relative overflow-x-hidden font-sans text-slate-800 antialiased p-4 sm:p-6 lg:p-8">

    <div class="absolute -top-[5%] -left-[10%] w-[300px] md:w-[400px] h-[300px] md:h-[400px] bg-blue-300 rounded-full blur-[80px] opacity-30 animate-float-bg z-0 pointer-events-none"></div>
    <div class="absolute -bottom-[10%] -right-[5%] w-[350px] md:w-[500px] h-[350px] md:h-[500px] bg-cyan-200 rounded-full blur-[80px] opacity-30 animate-float-bg z-0 pointer-events-none" style="animation-delay: -4s;"></div>

    <div class="w-full max-w-5xl mx-auto z-10">

        <div class="bg-white/95 backdrop-blur-xl rounded-[2.5rem] shadow-[0_25px_50px_-12px_rgba(37,99,235,0.15)] overflow-hidden border border-white flex flex-col md:flex-row animate-slide-up">

            <div class="{{ $status }} w-full md:w-5/12 p-10 lg:p-14 flex flex-col justify-center items-center text-center relative overflow-hidden text-white shrink-0">

                <i class="fa-solid fa-triangle-exclamation absolute -top-10 -left-10 text-[12rem] md:text-[14rem] opacity-10 -rotate-12 pointer-events-none"></i>

                <div class="animate-float-content flex flex-col items-center z-10 w-full">

                    <div class="drop-shadow-[0_10px_15px_rgba(0,0,0,0.2)] mb-6">
                        @if($status == 'Aman')
                            <i class="fa-solid fa-house-circle-check text-7xl lg:text-8xl"></i>
                        @elseif($status == 'Waspada')
                            <i class="fa-solid fa-cloud-showers-heavy text-7xl lg:text-8xl"></i>
                        @elseif($status == 'Siaga')
                            <i class="fa-solid fa-house-flood-water text-7xl lg:text-8xl"></i>
                        @else
                            <i class="fa-solid fa-house-tsunami text-7xl lg:text-8xl"></i>
                        @endif
                    </div>

                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-wider uppercase mb-8 drop-shadow-md">
                        {{ strtoupper($status) }}
                    </h1>

                    <div class="inline-flex items-center gap-2 bg-white/20 backdrop-blur-md px-8 py-3 rounded-full font-bold text-xl lg:text-2xl border border-white/30 shadow-[0_8px_20px_rgba(0,0,0,0.1)]">
                        Skor Fuzzy: <span class="text-white">{{ $skor }}</span>
                    </div>

                </div>
            </div>

            <div class="w-full md:w-7/12 p-6 sm:p-8 lg:p-12 bg-slate-50 flex flex-col justify-center">

                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 gap-5">
                    <div>
                        <h4 class="text-2xl font-bold text-slate-900 mb-1">Rincian Observasi</h4>
                        <p class="text-sm text-slate-500 m-0">Hasil perhitungan rule base sistem</p>
                    </div>
                    <a href="{{ route('banjir.index') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3 bg-white border-2 border-slate-200 text-slate-600 font-semibold rounded-xl hover:bg-blue-600 hover:text-white hover:border-blue-600 hover:shadow-[0_10px_20px_-5px_rgba(37,99,235,0.4)] hover:-translate-y-1 transition-all duration-300">
                        <i class="fa-solid fa-rotate-left"></i> Analisis Ulang
                    </a>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">

                    <div class="bg-white p-6 rounded-2xl border border-slate-100 text-center shadow-sm hover:-translate-y-2 hover:shadow-xl hover:border-blue-200 transition-all duration-300">
                        <div class="w-14 h-14 mx-auto bg-blue-50 text-blue-600 flex items-center justify-center rounded-2xl text-2xl mb-4">
                            <i class="fa-solid fa-water"></i>
                        </div>
                        <p class="text-3xl font-bold text-slate-800 m-0">
                            {{ $tma }}<span class="text-sm text-slate-500 font-medium ml-1">m</span>
                        </p>
                        <span class="block text-xs font-bold text-slate-500 uppercase tracking-widest mt-2">Tinggi Air</span>
                    </div>

                    <div class="bg-white p-6 rounded-2xl border border-slate-100 text-center shadow-sm hover:-translate-y-2 hover:shadow-xl hover:border-teal-200 transition-all duration-300">
                        <div class="w-14 h-14 mx-auto bg-teal-50 text-teal-600 flex items-center justify-center rounded-2xl text-2xl mb-4">
                            <i class="fa-solid fa-cloud-rain"></i>
                        </div>
                        <p class="text-3xl font-bold text-slate-800 m-0">
                            {{ $ch }}<span class="text-sm text-slate-500 font-medium ml-1">mm</span>
                        </p>
                        <span class="block text-xs font-bold text-slate-500 uppercase tracking-widest mt-2">Curah Hujan</span>
                    </div>

                    <div class="bg-white p-6 rounded-2xl border border-slate-100 text-center shadow-sm hover:-translate-y-2 hover:shadow-xl hover:border-fuchsia-200 transition-all duration-300">
                        <div class="w-14 h-14 mx-auto bg-fuchsia-50 text-fuchsia-600 flex items-center justify-center rounded-2xl text-2xl mb-4">
                            <i class="fa-regular fa-clock"></i>
                        </div>
                        <p class="text-3xl font-bold text-slate-800 m-0">
                            {{ $dur }}<span class="text-sm text-slate-500 font-medium ml-1">Jam</span>
                        </p>
                        <span class="block text-xs font-bold text-slate-500 uppercase tracking-widest mt-2">Durasi</span>
                    </div>

                </div>

                <div class="bg-blue-50/80 border border-blue-200/60 rounded-2xl p-5 flex flex-col sm:flex-row gap-4 items-start hover:-translate-y-1 hover:shadow-md transition-all duration-300">
                    <div class="text-blue-600 mt-1 shrink-0">
                        <i class="fa-solid fa-microchip text-2xl"></i>
                    </div>
                    <div>
                        <strong class="block text-slate-800 text-lg mb-1">Metode Mamdani Aktif</strong>
                        <p class="text-sm text-slate-600 m-0 leading-relaxed">
                            Skor kerawanan dihitung menggunakan metode <strong>Centroid (Titik Berat)</strong> dari hasil agregasi (MAX) kurva himpunan output fuzzy berdasarkan data observasi.
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </div>
</body>
</html>
