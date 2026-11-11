@extends('layouts.app')

@section('title', 'Tambah lokasi')

@section('content')
    <h1 class="text-2xl font-bold tracking-tight text-slate-900">Tambah Lokasi Penyimpanan</h1>

    <form action="{{ route('locations.store') }}" method="POST"
        class="flex w-full max-w-2xl flex-col gap-5 rounded-xl border border-slate-200 bg-white p-5 shadow-sm md:p-6">
        @csrf

        <div class="flex flex-col gap-2">
            <label class="text-sm font-medium text-slate-700" for="name">Nama Lokasi</label>
            <input id="name" name="name" type="text" value="{{ old('name', $locations->name ?? '') }}" required
                class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm focus:outline-2 focus:outline-blue-600">
        </div>

        <div class="flex flex-col gap-2">
            <label class="text-sm font-medium text-slate-700" for="description">Deskripsi</label>
            <textarea id="description" name="description" rows="3"
                class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm focus:outline-2 focus:outline-blue-600">{{ old('description', $locations->description ?? '') }}</textarea>
        </div>

        <div class="flex flex-wrap items-center gap-4">
            <button type="submit"
                class="rounded-lg bg-blue-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-blue-700">Simpan</button>
            <a href="{{ route('locations.index') }}"
                class="px-4 py-2.5 text-sm font-medium text-slate-600 hover:text-blue-700">Batal</a>
        </div>
    </form>
@endsection
