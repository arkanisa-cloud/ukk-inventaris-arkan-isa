@extends('layouts.app')

@section('title', 'Judul Halaman')

@section('content')
    <h1 class="text-2xl font-bold tracking-tight text-slate-900">Judul Halaman</h1>

    {{-- Ganti # dengan route tambah. --}}
    <a href="#"
        class="self-start rounded-lg bg-blue-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-blue-700">Tambah</a>

    {{-- Hapus pencarian jika tidak diperlukan; sesuaikan action dan tautan reset. --}}
    <form action="#" method="GET" class="flex flex-wrap items-end gap-3">
        <div class="flex min-w-0 flex-1 flex-col gap-2">
            <label class="text-sm font-medium text-slate-700" for="search">Pencarian</label>
            <input id="search" name="search" type="search" value="{{ request('search') }}"
                class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm focus:outline-2 focus:outline-blue-600">
        </div>
        {{-- Filter dari database: sesuaikan filter_id, $pilihan, $opsi, dan properti. --}}
        <div class="flex flex-col gap-2">
            <label class="text-sm font-medium text-slate-700" for="filter_id">Filter Data</label>
            <select id="filter_id" name="filter_id"
                class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm focus:outline-2 focus:outline-blue-600">
                <option value="">Semua data</option>
                @foreach ($pilihan as $opsi)
                    <option value="{{ $opsi->id }}" @selected(request('filter_id') == $opsi->id)>{{ $opsi->nama }}</option>
                @endforeach
            </select>
        </div>
        {{-- Filter pilihan tetap: sesuaikan enum_field, nilai option, dan label; hapus jika tidak diperlukan. --}}
        <div class="flex flex-col gap-2">
            <label class="text-sm font-medium text-slate-700" for="enum_field">Filter Pilihan</label>
            <select id="enum_field" name="enum_field"
                class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm focus:outline-2 focus:outline-blue-600">
                <option value="">Semua pilihan</option>
                <option value="nilai_satu" @selected(request('enum_field') == 'nilai_satu')>Pilihan Satu</option>
                <option value="nilai_dua" @selected(request('enum_field') == 'nilai_dua')>Pilihan Dua</option>
            </select>
        </div>
        <button type="submit"
            class="rounded-lg bg-blue-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-blue-700">Terapkan</button>
        <a href="#" class="px-4 py-2.5 text-sm font-medium text-slate-600 hover:text-blue-700">Reset</a>
    </form>

    <div class="min-w-0 overflow-x-auto rounded-xl border border-slate-200 bg-white shadow-sm">
        <table class="w-full text-left text-sm">
            <thead class="bg-slate-100 text-xs uppercase tracking-wide text-slate-600">
                <tr>
                    <th scope="col" class="px-5 py-4">Nama</th>
                    <th scope="col" class="px-5 py-4">Aksi</th>
                </tr>
            </thead>
            <tbody>
                {{-- Ganti $daftar, $baris, dan properti nama sesuai data controller/model. --}}
                @forelse ($daftar as $baris)
                    <tr class="border-t border-slate-100 hover:bg-slate-50">
                        <td class="px-5 py-4">{{ $baris->nama }}</td>
                        <td class="px-5 py-4">
                            {{-- Isi route edit/hapus beserta ID baris; hapus kolom aksi untuk riwayat. --}}
                            <div class="flex items-center gap-4">
                                <a href="#" class="font-medium text-blue-700 hover:underline">Edit</a>
                                <form action="#" method="POST" onsubmit="return confirm('Hapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="font-medium text-red-700 hover:underline">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        {{-- Sesuaikan colspan dengan jumlah kolom tabel. --}}
                        <td colspan="2" class="px-5 py-10 text-center text-slate-500">Belum ada data.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
