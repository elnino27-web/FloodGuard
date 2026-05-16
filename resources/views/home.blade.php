<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FloodGuard | Sistem Deteksi Dini Banjir</title>

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
        /* Animasi mengambang untuk gambar (dipertahankan dari kode asli) */
        @keyframes float-img {
            0% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-15px) rotate(1deg); }
            100% { transform: translateY(0px) rotate(0deg); }
        }
        .animate-float {
            animation: float-img 7s ease-in-out infinite;
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-900 font-sans overflow-x-hidden relative min-h-screen flex items-center">

    <div class="absolute -top-[5%] -left-[10%] w-[300px] md:w-[500px] h-[300px] md:h-[500px] bg-blue-200 rounded-full blur-[80px] md:blur-[100px] opacity-40 animate-pulse z-0 pointer-events-none"></div>
    <div class="absolute bottom-[5%] -right-[5%] w-[250px] md:w-[400px] h-[250px] md:h-[400px] bg-cyan-200 rounded-full blur-[80px] md:blur-[100px] opacity-40 animate-pulse z-0 pointer-events-none" style="animation-delay: 2s;"></div>

    <section class="relative z-10 w-full py-12 lg:py-0">
        <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-12 items-center">

                <div class="flex justify-center items-center relative order-1 lg:order-2">
                    <div class="relative w-full max-w-[280px] sm:max-w-md lg:max-w-full animate-float">
                        <div class="absolute inset-0 bg-gradient-to-tr from-blue-300 to-cyan-200 rounded-3xl blur-2xl opacity-40 translate-y-4"></div>

                        <img src="https://img.freepik.com/free-vector/weather-concept-illustration_114360-1189.jpg?w=740&t=st=1708420000~exp=1708420600~hmac=e20e8b26e0b7f6b9b3e0d8f0d8a5c3d2e9f0d8a5c3d2e9f0d8a5c3d2e9"
                             alt="Ilustrasi Cuaca dan Banjir"
                             class="relative z-10 w-full h-auto rounded-[2rem] shadow-[0_30px_60px_-15px_rgba(0,0,0,0.1),0_15px_25px_-10px_rgba(0,0,0,0.05)] mix-blend-multiply object-cover">
                    </div>
                </div>

                <div class="flex flex-col items-center text-center lg:items-start lg:text-left order-2 lg:order-1">

                    <div class="inline-flex items-center gap-2 px-5 py-2 rounded-full bg-blue-50/80 border border-blue-100/50 text-blue-600 text-sm font-semibold mb-6 backdrop-blur-sm shadow-sm">
                        <i class="fa-solid fa-microchip"></i> Sistem Pakar Logika Fuzzy
                    </div>

                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold leading-[1.15] tracking-tight text-slate-800 mb-5">
                        Analisis Cerdas,<br>
                        <span class="bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-cyan-500">Cegah Risiko Banjir.</span>
                    </h1>

                    <p class="text-base sm:text-lg text-slate-600 mb-8 leading-relaxed max-w-xl">
                        <strong>FloodGuard</strong> adalah sistem pendukung keputusan yang memproses data Tinggi Muka Air, Curah Hujan, dan Durasi secara <i>real-time</i> menggunakan metode Mamdani untuk tingkat akurasi yang tinggi.
                    </p>

                    <div class="w-full sm:w-auto mb-10">
                        <a href="{{ route('banjir.index') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-3 px-8 py-4 bg-gradient-to-r from-blue-600 to-blue-800 text-white font-bold rounded-2xl shadow-[0_12px_24px_-8px_rgba(37,99,235,0.5)] hover:shadow-[0_20px_32px_-8px_rgba(37,99,235,0.6)] hover:-translate-y-1 transition-all duration-300">
                            Mulai Analisis <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>

                    <div class="flex flex-col sm:flex-row flex-wrap gap-4 w-full justify-center lg:justify-start">

                        <div class="w-full sm:w-auto inline-flex items-center justify-center sm:justify-start gap-3 bg-white/80 backdrop-blur-md px-5 py-3 rounded-2xl shadow-sm border border-white text-slate-700 font-medium hover:-translate-y-1 hover:shadow-md transition-all duration-300">
                            <div class="w-10 h-10 rounded-xl bg-blue-100 flex items-center justify-center shrink-0">
                                <i class="fa-solid fa-droplet text-blue-600"></i>
                            </div>
                            3 Parameter Input
                        </div>

                        <div class="w-full sm:w-auto inline-flex items-center justify-center sm:justify-start gap-3 bg-white/80 backdrop-blur-md px-5 py-3 rounded-2xl shadow-sm border border-white text-slate-700 font-medium hover:-translate-y-1 hover:shadow-md transition-all duration-300">
                            <div class="w-10 h-10 rounded-xl bg-cyan-100 flex items-center justify-center shrink-0">
                                <i class="fa-solid fa-code-branch text-cyan-600"></i>
                            </div>
                            27 Rule Base Aktif
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </section>

</body>
</html>
