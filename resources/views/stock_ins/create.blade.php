@extends('layouts.app')

@section('title', 'Tambah Stok')

@section('content')
    <h1 class="text-2xl font-bold tracking-tight text-slate-900">Tambah Stok Masuk</h1>

    <form action="{{ route('stock-ins.store') }}" method="POST"
        class="flex w-full max-w-2xl flex-col gap-5 rounded-xl border border-slate-200 bg-white p-5 shadow-sm md:p-6">
        @csrf

        <div class="flex flex-col gap-2">
            <label class="text-sm font-medium text-slate-700" for="item_id">Stok Barang</label>
            <select id="item_id" name="item_id"
                class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm focus:outline-2 focus:outline-blue-600">
                <option value="">Pilih Barang</option>
                @foreach ($items as $item)
                    <option value="{{ $item->id }}" @selected(old('item_id', $item->id ?? '') == $item->id)>{{ $item->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="flex flex-col gap-2">
            <label class="text-sm font-medium text-slate-700" for="quantity">Jumlah</label>
            <input id="quantity" name="quantity" type="number" step="1"
                value="{{ old('quantity', $item->quantity ?? '') }}"
                class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm focus:outline-2 focus:outline-blue-600">
        </div>

        <div class="flex flex-col gap-2">
            <label class="text-sm font-medium text-slate-700" for="date">Tanggal</label>
            <input id="date" name="date" type="date" value="{{ old('date', $stockIn->date ?? '') }}"
                class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm focus:outline-2 focus:outline-blue-600">
        </div>

        <div class="flex flex-col gap-2">
            <label class="text-sm font-medium text-slate-700" for="description">Keterangan</label>
            <textarea id="description" name="description" rows="3"
                class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm focus:outline-2 focus:outline-blue-600">{{ old('description', $stockIn->description ?? '') }}</textarea>
        </div>

        <div class="flex flex-wrap items-center gap-4">
            <button type="submit"
                class="rounded-lg bg-blue-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-blue-700">Simpan</button>
            <a href="{{ route('stock-ins.index') }}"
                class="px-4 py-2.5 text-sm font-medium text-slate-600 hover:text-blue-700">Batal</a>
        </div>
    </form>
@endsection
