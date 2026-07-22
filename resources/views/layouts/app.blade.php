<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Sistem Pakar Kucing' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-bg text-textmain min-h-screen">

<!-- NAVBAR -->
<nav class="bg-button border-b border-primary">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

        <!-- Logo & Title -->
        <div class="flex items-center gap-1">
            <img src="{{ asset('images/pets.png') }}"
                 alt="Logo Kucing"
                 class="w-7 h-7 object-contain">

            <span class="font-bold text-lg text-primary">
                Sistem Pakar Kucing
            </span>
        </div>

        <!-- Navigation -->
        <div class="space-x-6 text-main font-medium">
            <a href="/" class="hover:text-primary transition">Beranda</a>
            <a href="/diagnosa" class="hover:text-primary transition">Diagnosa</a>
            <a href="/penyakit" class="hover:text-primary transition">Daftar Penyakit</a>
            <a href="{{ route('riwayat') }}"
            class="hover:text-primary transition">Riwayat</a>
        </div>

    </div>
</nav>


<!-- CONTENT -->
<main class="max-w-7xl mx-auto px-6 py-10">
    @yield('content')
</main>

<!-- FOOTER -->
<footer class="text-center text-sm text-slate-400 py-6">
    © {{ date('Y') }} Sistem Pakar Diagnosis Penyakit Kulit Kucing
</footer>

</body>
</html>
