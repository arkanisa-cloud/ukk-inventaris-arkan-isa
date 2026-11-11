@extends('layouts.app')

@section('title', 'Rekap Inventaris')

@section('content')
    <h1 class="text-2xl font-bold">Rekap Inventaris</h1>

    {{-- Ganti angka contoh dengan variabel total dari controller. --}}
    <dl class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
        <div class="rounded border border-slate-200 bg-white p-4">
            <dt>Jenis Barang</dt>
            <dd class="text-2xl font-bold">0</dd>
        </div>
        <div class="rounded border border-slate-200 bg-white p-4">
            <dt>Stok Tersedia</dt>
            <dd class="text-2xl font-bold">0</dd>
        </div>
        <div class="rounded border border-slate-200 bg-white p-4">
            <dt>Total Masuk</dt>
            <dd class="text-2xl font-bold">0</dd>
        </div>
        <div class="rounded border border-slate-200 bg-white p-4">
            <dt>Total Keluar</dt>
            <dd class="text-2xl font-bold">0</dd>
        </div>
    </dl>

    <div class="overflow-x-auto rounded border border-slate-200 bg-white">
        <table class="w-full text-left">
            <caption class="p-3 text-left font-bold">Stok Barang</caption>
            <thead class="bg-slate-100">
                <tr>
                    <th scope="col" class="p-3">Nama Barang</th>
                    <th scope="col" class="p-3">Jumlah</th>
                </tr>
            </thead>
            <tbody>
                {{-- Sesuaikan variabel, properti, dan tambahkan kolom sesuai laporan. --}}
                @forelse ($daftar as $baris)
                    <tr class="border-t border-slate-200">
                        <td class="p-3">{{ $baris->nama }}</td>
                        <td class="p-3">{{ $baris->jumlah }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="p-3 text-center text-slate-600">Belum ada data.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
