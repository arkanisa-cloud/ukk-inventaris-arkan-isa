@extends('layouts.app')

@section('title', 'Stok Masuk')

@section('content')
    <h1 class="text-2xl font-bold tracking-tight text-slate-900">Stok Masuk</h1>

    <a href="{{ route('stock-ins.create') }}"
        class="self-start rounded-lg bg-blue-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-blue-700">Tambah</a>

    <div class="min-w-0 overflow-x-auto rounded-xl border border-slate-200 bg-white shadow-sm">
        <table class="w-full text-left text-sm">
            <thead class="bg-slate-100 text-xs uppercase tracking-wide text-slate-600">
                <tr>
                    <th scope="col" class="px-5 py-4">ID</th>
                    <th scope="col" class="px-5 py-4">Nama Barang</th>
                    <th scope="col" class="px-5 py-4">Jumlah</th>
                    <th scope="col" class="px-5 py-4">Tanggal</th>
                    <th scope="col" class="px-5 py-4">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($stockIns as $stockIn)
                    <tr class="border-t border-slate-100 hover:bg-slate-50">
                        <td class="px-5 py-4">{{ $stockIn->id }}</td>
                        <td class="px-5 py-4">{{ $stockIn->item->name }}</td>
                        <td class="px-5 py-4">{{ $stockIn->quantity }}</td>
                        <td class="px-5 py-4">{{ $stockIn->date }}</td>
                        <td class="px-5 py-4">{{ $stockIn->description ?? '-' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-5 py-10 text-center text-slate-500">Belum ada data.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
