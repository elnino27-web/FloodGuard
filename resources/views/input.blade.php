<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Parameter - FloodGuard</title>

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
        @keyframes float {
            0% { transform: translateY(0px) scale(1); }
            100% { transform: translateY(-20px) scale(1.05); }
        }
        .animate-float {
            animation: float 8s ease-in-out infinite alternate;
        }
        .animate-float-delayed {
            animation: float 8s ease-in-out 4s infinite alternate;
        }
        @keyframes slideUpFade {
            from { opacity: 0; transform: translateY(40px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-slide-up {
            animation: slideUpFade 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-blue-50 to-sky-100 min-h-screen flex items-center justify-center relative overflow-x-hidden font-sans text-slate-800 antialiased py-8 px-4 sm:px-6 lg:px-8">

    <div class="absolute -top-[5%] left-[10%] w-[400px] h-[400px] bg-blue-300 rounded-full blur-[80px] opacity-40 animate-float z-0 pointer-events-none hidden md:block"></div>
    <div class="absolute -bottom-[10%] right-[5%] w-[500px] h-[500px] bg-cyan-200 rounded-full blur-[80px] opacity-40 animate-float-delayed z-0 pointer-events-none hidden md:block"></div>

    <div class="w-full max-w-6xl mx-auto bg-white/95 backdrop-blur-xl rounded-[2rem] shadow-[0_25px_50px_-12px_rgba(37,99,235,0.15)] overflow-hidden relative z-10 animate-slide-up border border-white">

        <div class="grid grid-cols-1 md:grid-cols-12 min-h-[600px]">

            <div class="flex flex-col justify-center bg-gradient-to-br from-blue-800 to-blue-600 text-white p-8 lg:p-12 md:col-span-5 relative overflow-hidden">

                <i class="fa-solid fa-water absolute -bottom-8 -right-8 text-[12rem] md:text-[16rem] opacity-5 -rotate-12 pointer-events-none"></i>

                <div class="inline-flex items-center gap-2 px-4 py-2 bg-white/10 backdrop-blur-md rounded-full border border-white/20 text-sm font-semibold w-fit mb-6 shadow-sm">
                    <div class="w-2 h-2 bg-emerald-400 rounded-full shadow-[0_0_8px_rgba(52,211,153,0.8)] animate-pulse"></div>
                    Sistem Siap Digunakan
                </div>

                <h2 class="text-3xl lg:text-4xl font-bold mb-4 relative z-10">Parameter Analisis</h2>

                <p class="text-blue-100 text-sm lg:text-base leading-relaxed mb-8 relative z-10">
                    Masukkan data observasi aktual dari lapangan. Sistem akan memproses data tersebut menggunakan aturan himpunan fuzzy.
                </p>

                <ul class="space-y-4 relative z-10 mb-8">
                    <li class="flex items-center gap-4 bg-white/5 border border-white/10 rounded-2xl p-4 hover:bg-white/10 hover:translate-x-1 transition-all duration-300">
                        <div class="w-10 h-10 rounded-xl bg-white/20 flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-water text-lg"></i>
                        </div>
                        <div>
                            <span class="block text-xs text-blue-200 uppercase tracking-wider font-semibold mb-0.5">Tinggi Muka Air</span>
                            <strong class="text-sm lg:text-base">-3.0 s/d 5.5 Meter</strong>
                        </div>
                    </li>
                    <li class="flex items-center gap-4 bg-white/5 border border-white/10 rounded-2xl p-4 hover:bg-white/10 hover:translate-x-1 transition-all duration-300">
                        <div class="w-10 h-10 rounded-xl bg-white/20 flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-cloud-showers-heavy text-lg"></i>
                        </div>
                        <div>
                            <span class="block text-xs text-blue-200 uppercase tracking-wider font-semibold mb-0.5">Curah Hujan</span>
                            <strong class="text-sm lg:text-base">0 s/d 50 Milimeter</strong>
                        </div>
                    </li>
                    <li class="flex items-center gap-4 bg-white/5 border border-white/10 rounded-2xl p-4 hover:bg-white/10 hover:translate-x-1 transition-all duration-300">
                        <div class="w-10 h-10 rounded-xl bg-white/20 flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-stopwatch text-lg"></i>
                        </div>
                        <div>
                            <span class="block text-xs text-blue-200 uppercase tracking-wider font-semibold mb-0.5">Durasi Hujan</span>
                            <strong class="text-sm lg:text-base">0 s/d 2.0 Jam</strong>
                        </div>
                    </li>
                </ul>

                <div class="mt-auto pt-6 border-t border-white/20 relative z-10 flex items-center gap-4">
                    <div class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center shrink-0">
                        <i class="fa-solid fa-microchip text-lg"></i>
                    </div>
                    <div>
                        <strong class="block text-sm lg:text-base">Mesin Inferensi Mamdani</strong>
                        <span class="text-xs text-blue-200">Metode Centroid (Titik Berat)</span>
                    </div>
                </div>

            </div>

            <div class="p-6 sm:p-8 lg:p-12 md:col-span-7 flex flex-col justify-center">

                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 gap-4">
                    <div>
                        <h3 class="text-2xl font-bold text-slate-900">Data Observasi</h3>
                    </div>
                    <a href="{{ route('home') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-5 py-2.5 rounded-full bg-slate-100 text-slate-600 font-semibold text-sm hover:bg-slate-200 hover:text-slate-900 hover:-translate-x-1 transition-all">
                        <i class="fa-solid fa-arrow-left"></i> Kembali
                    </a>
                </div>

                <form action="{{ route('banjir.hitung') }}" method="POST" class="space-y-6">
                    @csrf

                    <div class="flex flex-col">
                        <label class="font-semibold text-slate-700 text-sm mb-2">Tinggi Muka Air (TMA)</label>
                        <div class="flex items-center bg-slate-100 rounded-2xl border-2 border-transparent focus-within:border-blue-500 focus-within:bg-white focus-within:shadow-[0_0_0_5px_rgba(37,99,235,0.1)] focus-within:-translate-y-0.5 transition-all duration-300">
                            <span class="pl-5 pr-3 text-slate-400"><i class="fa-solid fa-water"></i></span>
                            <input type="number" step="0.01" name="tma" required
                                   class="w-full py-4 bg-transparent outline-none text-slate-800 font-semibold placeholder:text-slate-400 placeholder:font-normal"
                                   placeholder="Masukkan angka (Contoh: 2.5)">
                            <span class="pr-5 pl-3 text-slate-800 font-bold">m</span>
                        </div>
                    </div>

                    <div class="flex flex-col">
                        <label class="font-semibold text-slate-700 text-sm mb-2">Tingkat Curah Hujan</label>
                        <div class="flex items-center bg-slate-100 rounded-2xl border-2 border-transparent focus-within:border-blue-500 focus-within:bg-white focus-within:shadow-[0_0_0_5px_rgba(37,99,235,0.1)] focus-within:-translate-y-0.5 transition-all duration-300">
                            <span class="pl-5 pr-3 text-slate-400"><i class="fa-solid fa-cloud-rain"></i></span>
                            <input type="number" step="0.1" name="curah_hujan" required
                                   class="w-full py-4 bg-transparent outline-none text-slate-800 font-semibold placeholder:text-slate-400 placeholder:font-normal"
                                   placeholder="Masukkan angka (Contoh: 15.5)">
                            <span class="pr-5 pl-3 text-slate-800 font-bold">mm</span>
                        </div>
                    </div>

                    <div class="flex flex-col">
                        <label class="font-semibold text-slate-700 text-sm mb-2">Durasi Terjadinya Hujan</label>
                        <div class="flex items-center bg-slate-100 rounded-2xl border-2 border-transparent focus-within:border-blue-500 focus-within:bg-white focus-within:shadow-[0_0_0_5px_rgba(37,99,235,0.1)] focus-within:-translate-y-0.5 transition-all duration-300">
                            <span class="pl-5 pr-3 text-slate-400"><i class="fa-regular fa-clock"></i></span>
                            <input type="number" step="0.01" name="durasi" required
                                   class="w-full py-4 bg-transparent outline-none text-slate-800 font-semibold placeholder:text-slate-400 placeholder:font-normal"
                                   placeholder="Masukkan angka (Contoh: 1.2)">
                            <span class="pr-5 pl-3 text-slate-800 font-bold">Jam</span>
                        </div>
                    </div>

                    <div class="pt-4">
                        <button type="submit" class="w-full py-4 rounded-2xl bg-gradient-to-r from-blue-600 to-blue-800 text-white font-bold text-lg shadow-[0_10px_20px_-5px_rgba(37,99,235,0.4)] hover:-translate-y-1 hover:shadow-[0_15px_30px_-5px_rgba(37,99,235,0.5)] transition-all duration-300 flex justify-center items-center gap-3">
                            Kalkulasi Tingkat Kerawanan <i class="fa-solid fa-wand-magic-sparkles"></i>
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</body>
</html>
