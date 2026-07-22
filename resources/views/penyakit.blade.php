@extends('layouts.app')

@section('content')
<style>
    /* CSS untuk Animasi Flip Card 3D */
    .flip-card { background-color: transparent; width: 100%; height: 280px; perspective: 1000px; }
    .flip-card-inner { position: relative; width: 100%; height: 100%; text-align: center; transition: transform 0.6s cubic-bezier(0.4, 0.2, 0.2, 1); transform-style: preserve-3d; }
    .flip-card:hover .flip-card-inner { transform: rotateY(180deg); }
    .flip-card-front, .flip-card-back { position: absolute; width: 100%; height: 100%; -webkit-backface-visibility: hidden; backface-visibility: hidden; border-radius: 1.25rem; display: flex; flex-direction: column; justify-content: center; align-items: center; padding: 1.5rem; box-shadow: 0 4px 10px -1px rgba(0, 0, 0, 0.05); }

    /* Konsistensi Tone Warna Sky Blue */
    .flip-card-front { background-color: #ffffff; border: 1px solid #bae6fd; }
    .flip-card-back { background-color: #0ea5e9; color: white; transform: rotateY(180deg); border: 1px solid #0ea5e9; }
</style>

<div class="max-w-6xl mx-auto space-y-16 py-6 px-4">

    <section>
        <div class="text-center mb-10">
            <h2 class="text-3xl font-bold text-sky-500 mb-2">Daftar Penyakit Kulit Kucing</h2>
            <p class="text-slate-500">Pusat informasi medis mengenai karakteristik patologi kulit umum pada felid.</p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="bg-white rounded-xl p-6 shadow-sm border border-sky-100 hover:shadow-md hover:border-sky-300 transition duration-300">
                <h3 class="text-xl font-bold text-sky-600 mb-2">Scabies (Kudis Kucing)</h3>
                <p class="text-slate-500 text-sm mb-5 min-h-[60px] leading-relaxed">Penyakit ektoparasit akibat tungau yang menyebabkan gatal ekstrem, lesi korosif, dan kebotakan.</p>
                <div>
                    <h4 class="font-semibold text-sm text-slate-700 mb-2 border-t pt-3">Gejala Klinis Utama:</h4>
                    <ul class="list-disc list-inside text-sm text-slate-500 space-y-1">
                        <li>Gatal berlebihan</li>
                        <li>Sering menggaruk area tertentu</li>
                        <li>Terdapat luka atau keropeng</li>
                    </ul>
                </div>
            </div>

            <div class="bg-white rounded-xl p-6 shadow-sm border border-sky-100 hover:shadow-md hover:border-sky-300 transition duration-300">
                <h3 class="text-xl font-bold text-sky-600 mb-2">Dermatitis Alergi</h3>
                <p class="text-slate-500 text-sm mb-5 min-h-[60px] leading-relaxed">Reaksi imun terhadap alergen lingkungan, kutu, atau nutrisi yang memicu inflamasi dermal kronis.</p>
                <div>
                    <h4 class="font-semibold text-sm text-slate-700 mb-2 border-t pt-3">Gejala Klinis Utama:</h4>
                    <ul class="list-disc list-inside text-sm text-slate-500 space-y-1">
                        <li>Gatal berlebihan</li>
                        <li>Kulit kemerahan atau iritasi</li>
                        <li>Kucing sering menjilat area tertentu</li>
                    </ul>
                </div>
            </div>

            <div class="bg-white rounded-xl p-6 shadow-sm border border-sky-100 hover:shadow-md hover:border-sky-300 transition duration-300">
                <h3 class="text-xl font-bold text-sky-600 mb-2">Jamur Kulit (Ringworm)</h3>
                <p class="text-slate-500 text-sm mb-5 min-h-[60px] leading-relaxed">Infeksi jamur dermatofita yang memakan keratin rambut, menyebabkan kerontokan melingkar dan menular (zoonosis).</p>
                <div>
                    <h4 class="font-semibold text-sm text-slate-700 mb-2 border-t pt-3">Gejala Klinis Utama:</h4>
                    <ul class="list-disc list-inside text-sm text-slate-500 space-y-1">
                        <li>Bulu rontok membentuk pola tertentu</li>
                        <li>Kulit bersisik atau berketombe</li>
                        <li>Rambut menipis</li>
                    </ul>
                </div>
            </div>

            <div class="bg-white rounded-xl p-6 shadow-sm border border-sky-100 hover:shadow-md hover:border-sky-300 transition duration-300">
                <h3 class="text-xl font-bold text-sky-600 mb-2">Infeksi Bakteri (Pioderma)</h3>
                <p class="text-slate-500 text-sm mb-5 min-h-[60px] leading-relaxed">Kolonisasi bakteri pada struktur kulit yang rusak, menghasilkan nanah (eksudat purulen) dan radang akut.</p>
                <div>
                    <h4 class="font-semibold text-sm text-slate-700 mb-2 border-t pt-3">Gejala Klinis Utama:</h4>
                    <ul class="list-disc list-inside text-sm text-slate-500 space-y-1">
                        <li>Kulit tampak lembab atau bernanah</li>
                        <li>Kulit kemerahan atau iritasi</li>
                        <li>Kulit berbau tidak sedap</li>
                    </ul>
                </div>
            </div>

            <div class="bg-white rounded-xl p-6 shadow-sm border border-sky-100 hover:shadow-md hover:border-sky-300 transition duration-300">
                <h3 class="text-xl font-bold text-sky-600 mb-2">Kutu / Parasit Kulit</h3>
                <p class="text-slate-500 text-sm mb-5 min-h-[60px] leading-relaxed">Investasi organisme ektoparasit (kutu/pinjal) yang mengonsumsi darah inang, memicu iritasi konstan.</p>
                <div>
                    <h4 class="font-semibold text-sm text-slate-700 mb-2 border-t pt-3">Gejala Klinis Utama:</h4>
                    <ul class="list-disc list-inside text-sm text-slate-500 space-y-1">
                        <li>Sering menggaruk area tertentu</li>
                        <li>Gatal berlebihan</li>
                        <li>Terdapat luka atau keropeng</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-sky-50/50 rounded-3xl p-8 border border-sky-100">
        <div class="text-center mb-10">
            <h2 class="text-3xl font-bold text-sky-500 mb-2">Tantangan dan Fakta</h2>
            <p class="text-slate-500">Evaluasi kritis miskonsepsi perawatan kulit hewan peliharaan.</p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <span class="text-sky-500 font-bold mb-2 tracking-widest uppercase text-[10px]">Tantangan</span>
                        <h3 class="text-base font-bold text-slate-700 leading-snug">"Kucing menggaruk telinga adalah rutinitas kebersihan wajar."</h3>
                        <div class="mt-4 flex items-center text-sky-400 text-xs font-semibold">
                            <i class="fa-solid fa-arrow-pointer mr-2"></i> Arahkan kursor
                        </div>
                    </div>
                    <div class="flip-card-back">
                        <h3 class="text-base font-bold mb-2 text-white border-b border-sky-200 pb-1 w-full">Fakta Medis</h3>
                        <p class="text-xs leading-relaxed text-sky-50 text-justify">Garukan obsesif mengindikasikan iritasi akibat investasi tungau telinga atau jamur stadium awal yang butuh penanganan segera.</p>
                    </div>
                </div>
            </div>

            <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <span class="text-sky-500 font-bold mb-2 tracking-widest uppercase text-[10px]">Tantangan</span>
                        <h3 class="text-base font-bold text-slate-700 leading-snug">"Sampo bayi manusia sangat aman merawat bulu rontok."</h3>
                        <div class="mt-4 flex items-center text-sky-400 text-xs font-semibold">
                            <i class="fa-solid fa-arrow-pointer mr-2"></i> Arahkan kursor
                        </div>
                    </div>
                    <div class="flip-card-back">
                        <h3 class="text-base font-bold mb-2 text-white border-b border-sky-200 pb-1 w-full">Fakta Medis</h3>
                        <p class="text-xs leading-relaxed text-sky-50 text-justify">Kucing memiliki pH kulit cenderung basa (6.5–7.5). Sampo manusia merusak lapisan pelindung alami (acid mantle) dan memperparah infeksi.</p>
                    </div>
                </div>
            </div>

            <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <span class="text-sky-500 font-bold mb-2 tracking-widest uppercase text-[10px]">Tantangan</span>
                        <h3 class="text-base font-bold text-slate-700 leading-snug">"Jamur kucing sepenuhnya aman dan tidak menular ke manusia."</h3>
                        <div class="mt-4 flex items-center text-sky-400 text-xs font-semibold">
                            <i class="fa-solid fa-arrow-pointer mr-2"></i> Arahkan kursor
                        </div>
                    </div>
                    <div class="flip-card-back">
                        <h3 class="text-base font-bold mb-2 text-white border-b border-sky-200 pb-1 w-full">Fakta Medis</h3>
                        <p class="text-xs leading-relaxed text-sky-50 text-justify">Ringworm terklasifikasi sebagai penyakit zoonosis. Spora jamur dapat menular silang secara langsung ke epidermis manusia.</p>
                    </div>
                </div>
            </div>

            <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <span class="text-sky-500 font-bold mb-2 tracking-widest uppercase text-[10px]">Tantangan</span>
                        <h3 class="text-base font-bold text-slate-700 leading-snug">"Oli bekas efektif menyembuhkan infeksi kulit kronis/scabies."</h3>
                        <div class="mt-4 flex items-center text-sky-400 text-xs font-semibold">
                            <i class="fa-solid fa-arrow-pointer mr-2"></i> Arahkan kursor
                        </div>
                    </div>
                    <div class="flip-card-back">
                        <h3 class="text-base font-bold mb-2 text-white border-b border-sky-200 pb-1 w-full">Fakta Medis</h3>
                        <p class="text-xs leading-relaxed text-sky-50 text-justify">Senyawa hidrokarbon pada oli terserap ke pembuluh darah kulit dan memicu keracunan sistemik hingga kegagalan fungsi organ dalam.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="border border-slate-200 bg-white rounded-2xl p-6 shadow-sm">
        <div class="flex items-center gap-3 mb-4 border-b pb-3 text-slate-700">
            <h4 class="font-bold text-sm uppercase tracking-wider">Referensi Ilmiah & Pustaka Medis Veteriner</h4>
        </div>
        <p class="text-xs text-slate-400 mb-4 leading-relaxed">
            Data taksonomi, variabel gejala klinis, dan pembobotan Certainty Factor sistem pakar ini diselaraskan dengan kajian literatur dermatologi veteriner di Indonesia:
        </p>
        <ul class="space-y-3 text-xs text-slate-500 font-mono">
            <li class="flex items-start gap-3">
                <span class="text-sky-500 font-bold select-none">[1]</span>
                <span>Yudhana, A., dkk. (2021). Diagnosa dan observasi terapi infestasi ektoparasit Notoedres cati penyebab penyakit scabiosis pada kucing peliharaan. <span class="italic text-slate-600">Media Kedokteran Hewan, 32</span>(2), 70-78.</span>
            </li>
            <li class="flex items-start gap-3">
                <span class="text-sky-500 font-bold select-none">[2]</span>
                <span>Indarjulianto, S., dkk. (2017). Infeksi Microsporum canis pada Kucing Penderita Dermatitis. <span class="italic text-slate-600">Jurnal Veteriner, 18</span>(2), 207-212.</span>
            </li>
            <li class="flex items-start gap-3">
                <span class="text-sky-500 font-bold select-none">[3]</span>
                <span>Pratama, A. R., Harima, F., & Sari, S. P. (2024). Penanganan Pioderma (Infeksi Bakteri) pada Anjing dan Kucing. <span class="italic text-slate-600">Jurnal Vitek Bidang Kedokteran Hewan, 14</span>(1).</span>
            </li>
            <li class="flex items-start gap-3">
                <span class="text-sky-500 font-bold select-none">[4]</span>
                <span>Kurniawati, A., dkk. (2019). Penanganan Flea Allergy Dermatitis (FAD) pada Kucing. <span class="italic text-slate-600">Jurnal Medik Veteriner, 2</span>(1), 30-36.</span>
            </li>
            <li class="flex items-start gap-3">
                <span class="text-sky-500 font-bold select-none">[5]</span>
                <span>Widyastuti, R., dkk. (2020). Prevalensi Ektoparasit Ctenocephalides felis pada Kucing Peliharaan. <span class="italic text-slate-600">Acta VETERINARIA Indonesiana, 8</span>(2), 45-51.</span>
            </li>
        </ul>
    </section>

</div>
@endsection
