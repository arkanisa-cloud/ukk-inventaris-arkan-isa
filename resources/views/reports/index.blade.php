@extends('layouts.app')

@section('title', 'Rekap Inventaris')

@section('content')
    <h1 class="text-2xl font-bold">Rekap Inventaris</h1>

    {{-- Ganti angka contoh dengan variabel total dari controller. --}}
    <dl class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
        <div class="rounded border border-slate-200 bg-white p-4">
            <dt>Jenis Barang</dt>
            <dd class="text-2xl font-bold">{{ $totalItem }}</dd>
        </div>
        <div class="rounded border border-slate-200 bg-white p-4">
            <dt>Stok Tersedia</dt>
            <dd class="text-2xl font-bold">{{ $totalStock }}</dd>
        </div>
        <div class="rounded border border-slate-200 bg-white p-4">
            <dt>Total Masuk</dt>
            <dd class="text-2xl font-bold">{{ $totalStockIn }}</dd>
        </div>
        <div class="rounded border border-slate-200 bg-white p-4">
            <dt>Total Keluar</dt>
            <dd class="text-2xl font-bold">{{ $totalStockOut }}</dd>
        </div>
    </dl>

    <div class="overflow-x-auto rounded border border-slate-200 bg-white">
        <table class="w-full text-left">
            <caption class="p-3 text-left font-bold">Stok Barang</caption>
            <thead class="bg-slate-100">
                <tr>
                    <th scope="col" class="px-5 py-4">Kode Barang</th>
                    <th scope="col" class="px-5 py-4">Nama</th>
                    <th scope="col" class="px-5 py-4">Jumlah</th>
                    <th scope="col" class="px-5 py-4">Kategori</th>
                    <th scope="col" class="px-5 py-4">Lokasi</th>
                    <th scope="col" class="px-5 py-4">Kondisi</th>
                    <th scope="col" class="px-5 py-4">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($items as $item)
                    <tr class="border-t border-slate-100 hover:bg-slate-50">
                        <td class="px-5 py-4">{{ $item->code }}</td>
                        <td class="px-5 py-4">{{ $item->name }}</td>
                        <td class="px-5 py-4">{{ $item->quantity }}</td>
                        <td class="px-5 py-4">{{ $item->category->name }}</td>
                        <td class="px-5 py-4">{{ $item->location->name }}</td>
                        <td class="px-5 py-4">{{ $item->condition }}</td>
                        <td class="px-5 py-4">
                            <div class="flex items-center gap-4">
                                <a href="{{ route('items.edit', $item) }}"
                                    class="font-medium text-blue-700 hover:underline">Edit</a>
                                <form action="{{ route('items.destroy', $item) }}" method="POST"
                                    onsubmit="return confirm('Hapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="font-medium text-red-700 hover:underline">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-5 py-10 text-center text-slate-500">Belum ada data.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
