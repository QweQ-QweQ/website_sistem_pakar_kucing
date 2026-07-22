@extends('layouts.app')

@section('content')
<div id="loading-screen" class="fixed inset-0 z-50 hidden bg-white/95 backdrop-blur-sm flex-col items-center justify-center">
    <div class="relative w-24 h-24 mb-8">
        <div class="absolute inset-0 border-4 border-sky-100 rounded-full"></div>
        <div class="absolute inset-0 border-4 border-sky-600 rounded-full border-t-transparent animate-spin"></div>
        <div class="absolute inset-0 flex items-center justify-center text-sky-600 text-2xl">
            <i class="fa-solid fa-microchip"></i>
        </div>
    </div>

    <h3 class="text-2xl font-bold text-sky-900 mb-2">Memproses Diagnosa</h3>
    <p id="loading-text" class="text-slate-500 font-mono text-sm tracking-widest uppercase animate-pulse">
        Menghubungkan ke basis pengetahuan...
    </p>
</div>

<div class="max-w-5xl mx-auto py-8">
    <div class="text-center mb-10">
        <h2 class="text-3xl font-bold text-sky-600 mb-2">Pilih Gejala yang Terlihat</h2>
        <p class="text-slate-500">Klik pada kartu gejala yang sesuai dengan kondisi fisik kucing Anda.</p>
    </dijv>

    <form id="form-diagnosa" method="POST" action="/diagnosa/proses">
        @csrf
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4 mb-10">
            @foreach ($gejala as $kode => $nama)
                <label class="group cursor-pointer relative">
                    <input type="checkbox" name="gejala[]" value="{{ $kode }}" class="peer hidden">

                    <div class="h-full border-2 border-slate-100 rounded-2xl p-5 flex flex-col items-center text-center transition-all duration-300 bg-white shadow-sm group-hover:border-sky-300 peer-checked:border-sky-500 peer-checked:bg-sky-50 peer-checked:shadow-md">

                       <div class="w-16 h-16 mb-4 flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
    <img src="{{ asset('images/' . $kode . '.png') }}"
         alt="{{ $nama }}"
         class="w-full h-full object-contain drop-shadow-sm">
</div>

                        <span class="text-sm font-semibold text-slate-700 peer-checked:text-sky-900 leading-tight">
                            {{ $nama }}
                        </span>

                        <div class="absolute top-3 right-3 opacity-0 peer-checked:opacity-100 text-sky-600 transition-opacity">
                            <i class="fa-solid fa-circle-check text-xl"></i>
                        </div>
                    </div>
                </label>
            @endforeach
        </div>

        <div class="sticky bottom-6 flex justify-center">
            <button type="submit" class="bg-sky-600 hover:bg-sky-700 text-white px-10 py-4 rounded-full font-bold shadow-xl shadow-sky-200 transform transition hover:-translate-y-1 active:scale-95 flex items-center">
                <i class="fa-solid fa-wand-magic-sparkles mr-3"></i> Mulai Analisis Sistem Pakar
            </button>
        </div>
    </form>
</div>

<script>
    document.getElementById('form-diagnosa').addEventListener('submit', function(e) {
        // Cegah pengiriman form secara langsung
        e.preventDefault();

        // Validasi dasar: pastikan ada minimal 1 gejala yang dipilih
        const checkboxes = document.querySelectorAll('input[name="gejala[]"]:checked');
        if(checkboxes.length === 0) {
            alert('Silakan pilih minimal satu gejala untuk memulai diagnosa.');
            return;
        }

        // Tampilkan layar loading
        const loadingScreen = document.getElementById('loading-screen');
        loadingScreen.classList.remove('hidden');
        loadingScreen.classList.add('flex');

        // Skenario pergantian teks agar terlihat seperti komputasi nyata
        const loadingText = document.getElementById('loading-text');
        const prosesSkenario = [
            "Memindai basis pengetahuan...",
            "Mengekstraksi rule-based algoritm...",
            "Mengkalkulasi bobot gejala...",
            "Menyusun matriks probabilitas...",
            "Menyelesaikan analisis final..."
        ];

        let iterasi = 0;

        // Ganti teks setiap 700 milidetik
        const intervalGantiTeks = setInterval(() => {
            iterasi++;
            if (iterasi < prosesSkenario.length) {
                loadingText.innerText = prosesSkenario[iterasi];
            }
        }, 700);

        // Setelah 3.5 detik (3500ms), hentikan animasi dan kirim form ke Laravel
        setTimeout(() => {
            clearInterval(intervalGantiTeks);
            this.submit();
        }, 3500);
    });
</script>
@endsection
