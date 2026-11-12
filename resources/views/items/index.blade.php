@extends('layouts.app')

@section('title', 'Barang')

@section('content')
    <h1 class="text-2xl font-bold tracking-tight text-slate-900">Barang</h1>

    <a href="{{ route('items.create') }}"
        class="self-start rounded-lg bg-blue-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-blue-700">Tambah</a>

    <form action="{{ route('items.index') }}" method="GET" class="flex flex-wrap items-end gap-3">
        <div class="flex min-w-0 flex-1 flex-col gap-2">
            <label class="text-sm font-medium text-slate-700" for="search">Cari</label>
            <input id="search" name="search" type="search" value="{{ request('search') }}"
                class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm focus:outline-2 focus:outline-blue-600">
        </div>
        <div class="flex flex-col gap-2">
            <label class="text-sm font-medium text-slate-700" for="category_id">Pilih Kategori</label>
            <select id="category_id" name="category_id"
                class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm focus:outline-2 focus:outline-blue-600">
                <option value="">Semua Kategori</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @selected(request('category_id') == $category->id)>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="flex flex-col gap-2">
            <label class="text-sm font-medium text-slate-700" for="condition">Pilih Kondisi</label>
            <select id="condition" name="condition"
                class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm focus:outline-2 focus:outline-blue-600">
                <option value="">Semua Kondisi</option>
                <option value="baik" @selected(request('condition') == 'baik')>Baik</option>
                <option value="rusak_ringan" @selected(request('condition') == 'rusak_ringan')>Rusak Ringan</option>
                <option value="rusak_berat" @selected(request('condition') == 'rusak_berat')>Rusak Berat</option>
            </select>
        </div>
        <button type="submit"
            class="rounded-lg bg-blue-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-blue-700">Terapkan</button>
        <a href="{{ route('items.index') }}"
            class="px-4 py-2.5 text-sm font-medium text-slate-600 hover:text-blue-700">Reset</a>
    </form>

    <div class="min-w-0 overflow-x-auto rounded-xl border border-slate-200 bg-white shadow-sm">
        <table class="w-full text-left text-sm">
            <thead class="bg-slate-100 text-xs uppercase tracking-wide text-slate-600">
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
