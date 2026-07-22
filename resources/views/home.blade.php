@extends('layouts.app')

@section('content')
<div class="grid md:grid-cols-2 gap-10 items-center">
    <div>
        <h1 class="text-4xl font-bold mb-4 text-primary">
            Peduli Kesehatan Kulit Kucing,
            <span class="text-text">Dimulai dari Diagnosa yang Tepat</span>
        </h1>

        <p class="text-textmain mb-6">
            Sistem pakar ini membantu mengidentifikasi kemungkinan
            penyakit kulit kucing berdasarkan gejala yang terlihat,
            menggunakan pendekatan rule-based berbasis pengetahuan pakar.
        </p>

        <a href="/diagnosa"
           class="inline-block bg-primary hover:bg-hover text-white px-6 py-3 rounded-lg font-semibold">
            Mulai Diagnosa
        </a> 
    </div>

   <div class="overflow-hidden shadow-xl rounded-full w-64 h-64 mx-auto">
    <img src="images/kucing.jpg"
         alt="Kucing"
         class="w-full h-full object-cover">
</div>
</div>
</div>
@endsection
