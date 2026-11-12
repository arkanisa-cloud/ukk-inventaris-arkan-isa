@extends('layouts.app')

@section('title', 'Tambah Barang')

@section('content')
    <h1 class="text-2xl font-bold tracking-tight text-slate-900">Tambah Barang</h1>


    <form action="{{ route('items.store') }}" method="POST"
        class="flex w-full max-w-2xl flex-col gap-5 rounded-xl border border-slate-200 bg-white p-5 shadow-sm md:p-6">
        @csrf

        <div class="flex flex-col gap-2">
            <label class="text-sm font-medium text-slate-700" for="name">Nama Barang</label>
            <input id="name" name="name" type="text" value="{{ old('name', $item->name ?? '') }}" required
                class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm focus:outline-2 focus:outline-blue-600">
        </div>

        <div class="flex flex-col gap-2">
            <label class="text-sm font-medium text-slate-700" for="category_id">Kategori</label>
            <select id="category_id" name="category_id" required
                class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm focus:outline-2 focus:outline-blue-600">
                <option value="">Pilih Kategori</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @selected(old('category_id', $category->id ?? '') == $category->id)>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex flex-col gap-2">
            <label class="text-sm font-medium text-slate-700" for="location_id">Lokasi Penyimpanan</label>
            <select id="location_id" name="location_id" required
                class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm focus:outline-2 focus:outline-blue-600">
                <option value="">Pilih Lokasi</option>
                @foreach ($locations as $location)
                    <option value="{{ $location->id }}" @selected(old('location_id', $location->id ?? '') == $location->id)>{{ $location->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex flex-col gap-2">
            <label class="text-sm font-medium text-slate-700" for="condition">Kondisi</label>
            <select id="condition" name="condition" required
                class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm focus:outline-2 focus:outline-blue-600">
                <option value="baik" @selected(old('condition', $item->condition ?? 'baik') == 'baik')>Baik</option>
                <option value="rusak_ringan" @selected(old('condition', $item->condition ?? 'rusak_ringan') == 'rusak_ringan')>Rusak Ringan</option>
                <option value="rusak_berat" @selected(old('condition', $item->condition ?? 'rusak_berat') == 'rusak_berat')>Rusak Berat</option>
            </select>
        </div>

        <div class="flex flex-wrap items-center gap-4">
            <button type="submit"
                class="rounded-lg bg-blue-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-blue-700">Simpan</button>
            <a href="{{ route('items.index') }}"
                class="px-4 py-2.5 text-sm font-medium text-slate-600 hover:text-blue-700">Batal</a>
        </div>
    </form>
@endsection
