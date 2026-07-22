@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-10 rounded-3xl shadow-xl border border-sky-50 mt-6">
    <div class="text-center mb-10">
        <h2 class="text-4xl font-black text-sky-700 mb-2 tracking-tight">Analisis Sistem Selesai</h2>
        <p class="text-slate-500 font-medium">Berikut adalah hasil probabilitas berdasarkan algoritma pembobotan pakar.</p>
    </div>

    <div class="bg-gradient-to-br from-sky-400 to-sky-500 rounded-2xl p-8 text-white mb-8 shadow-lg shadow-sky-200">
        <div class="flex justify-between items-start mb-6">
            <div>
                <span class="bg-white/25 text-white px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-widest backdrop-blur-sm">Probabilitas Tertinggi</span>
                <h3 class="text-3xl font-bold mt-4 tracking-wide">{{ $hasilUtama['nama'] }}</h3>
            </div>
            <div class="text-right">
                <span class="text-6xl font-black tracking-tighter">{{ $hasilUtama['keyakinan'] }}%</span>
                <p class="text-sm text-sky-50 font-semibold mt-1">Tingkat Keyakinan</p>
            </div>
        </div>

        <div class="w-full bg-sky-700/20 rounded-full h-4 mb-6 overflow-hidden p-0.5">
            <div class="bg-white h-3 rounded-full shadow-sm" style="width: {{ $hasilUtama['keyakinan'] }}%"></div>
        </div>

        <p class="text-sky-50 leading-relaxed font-medium">{{ $hasilUtama['deskripsi'] }}</p>
    </div>

    <div class="grid md:grid-cols-2 gap-6 mb-10">
        <div class="border border-sky-100 bg-sky-50/50 rounded-2xl p-6">
            <h4 class="font-bold text-sky-800 mb-4 flex items-center uppercase tracking-wide text-sm">
                Gejala Terdeteksi
            </h4>
            <ul class="space-y-3">
                @foreach ($dipilih as $g)
                    <li class="flex items-start text-sm text-slate-600 font-medium">
                        <span class="w-2 h-2 bg-sky-400 rounded-full mr-3 mt-1.5 shrink-0"></span>
                        <span>{{ $g }}</span>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="border border-emerald-100 bg-emerald-50/50 rounded-2xl p-6">
            <h4 class="font-bold text-emerald-800 mb-4 flex items-center uppercase tracking-wide text-sm">
                Saran Tindakan Medis
            </h4>
            <ul class="space-y-3">
                @foreach ($hasilUtama['penanganan'] as $p)
                    <li class="flex items-start text-sm text-emerald-700 font-medium">
                        <span class="font-bold text-emerald-500 mr-3">✓</span>
                        <span>{{ $p }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="mb-10">
        <h4 class="text-slate-400 font-bold text-xs uppercase tracking-widest mb-4">Kemungkinan Lain (Differential Diagnosis)</h4>
        <div class="space-y-3">
            @foreach ($alternatif as $alt)
                <div class="flex justify-between items-center p-5 bg-white border border-slate-100 rounded-xl hover:border-sky-200 transition duration-200">
                    <span class="font-bold text-slate-600">{{ $alt['nama'] }}</span>
                    <span class="text-sky-500 font-mono font-bold text-lg">{{ $alt['keyakinan'] }}%</span>
                </div>
            @endforeach
        </div>
    </div>

    <div class="flex flex-col sm:flex-row gap-4">
        <a href="/diagnosa" class="flex-1 bg-sky-500 text-white text-center py-4 rounded-xl font-bold text-lg hover:bg-sky-600 transition shadow-lg shadow-sky-100">
            Diagnosa Ulang
        </a>
        <a href="/" class="flex-1 bg-white border-2 border-sky-100 text-sky-600 text-center py-4 rounded-xl font-bold text-lg hover:bg-sky-50 transition">
            Kembali ke Beranda
        </a>
    </div>
</div>
@endsection
