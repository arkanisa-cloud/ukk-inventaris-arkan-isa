<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Inventaris')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-slate-50 text-slate-800">
    <header class="border-b border-slate-200 bg-white">
        <nav class="mx-auto flex max-w-5xl flex-wrap items-center gap-4 p-4" aria-label="Navigasi utama">
            <strong>Logistix</strong>
            <a href="{{ route('categories.index') }}" class="text-blue-700 hover:underline">Kategori</a>
            <a href="{{ route('locations.index') }}" class="text-blue-700 hover:underline">Lokasi</a>
            <a href="{{ route('items.index') }}" class="text-blue-700 hover:underline">Barang</a>
            <a href="{{ route('stock-ins.index') }}" class="text-blue-700 hover:underline">Stok Masuk</a>
            <a href="{{ route('stock-outs.index') }}" class="text-blue-700 hover:underline">Stok Keluar</a>
            <a href="{{ route('reports.index') }}" class="text-blue-700 hover:underline">Rekap</a>
        </nav>
    </header>

    <main class="mx-auto flex max-w-5xl flex-col gap-4 p-4">
        @if (session('success'))
            <p role="status" class="rounded bg-green-100 p-3 text-green-800">{{ session('success') }}</p>
        @endif

        @if (session('error'))
            <p role="alert" class="rounded bg-red-100 p-3 text-red-800">{{ session('error') }}</p>
        @endif

        @if ($errors->any())
            <p role="alert" class="rounded bg-red-100 p-3 text-red-800">{{ $errors->first() }}</p>
        @endif

        @yield('content')
    </main>
</body>

</html>
