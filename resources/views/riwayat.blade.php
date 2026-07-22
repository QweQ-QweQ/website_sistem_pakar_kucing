@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto py-8">
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-sky-600">
            Riwayat Diagnosis
        </h2>

        <p class="text-slate-500 mt-2">
            Daftar hasil diagnosis yang pernah dilakukan.
        </p>
    </div>

    @if ($riwayat->isEmpty())
        <div class="bg-white border border-slate-200 rounded-xl p-8 text-center">
            <p class="text-slate-500">
                Belum ada riwayat diagnosis.
            </p>
        </div>
    @else
        <div class="space-y-5">
            @foreach ($riwayat as $item)
                <div class="bg-white border border-sky-100 rounded-2xl p-6 shadow-sm">
                    <div class="flex justify-between items-start gap-4">
                        <div>
                            <p class="text-xs text-slate-400 mb-1">
                                {{ $item->created_at->format('d-m-Y H:i') }}
                            </p>

                            <h3 class="text-xl font-bold text-sky-700">
                                {{ $item->hasil_penyakit }}
                            </h3>
                        </div>

                        <span class="text-2xl font-bold text-sky-600">
                            {{ $item->nilai_keyakinan }}%
                        </span>
                    </div>

                    <div class="mt-5">
                        <h4 class="font-semibold text-slate-700 mb-2">
                            Gejala yang dipilih:
                        </h4>

                        <ul class="list-disc list-inside text-slate-600">
                            @foreach ($item->gejala_dipilih as $gejala)
                                <li>{{ $gejala }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
