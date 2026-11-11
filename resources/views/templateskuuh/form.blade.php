@extends('layouts.app')

@section('title', 'Judul Form')

@section('content')
    <h1 class="text-2xl font-bold tracking-tight text-slate-900">Judul Form</h1>

    {{-- Sesuaikan action; hapus jenis field yang tidak diperlukan. --}}
    <form action="#" method="POST"
        class="flex w-full max-w-2xl flex-col gap-5 rounded-xl border border-slate-200 bg-white p-5 shadow-sm md:p-6">
        @csrf
        {{-- Untuk edit, tambahkan: @method('PUT') --}}

        {{-- Ganti nama field dan $record sesuai model; $record hanya diperlukan saat edit. --}}
        <div class="flex flex-col gap-2">
            <label class="text-sm font-medium text-slate-700" for="nama_field">Teks</label>
            <input id="nama_field" name="nama_field" type="text" value="{{ old('nama_field', $record->nama_field ?? '') }}"
                class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm focus:outline-2 focus:outline-blue-600">
        </div>

        <div class="flex flex-col gap-2">
            <label class="text-sm font-medium text-slate-700" for="angka_field">Angka</label>
            <input id="angka_field" name="angka_field" type="number" step="1"
                value="{{ old('angka_field', $record->angka_field ?? '') }}"
                class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm focus:outline-2 focus:outline-blue-600">
        </div>

        <div class="flex flex-col gap-2">
            <label class="text-sm font-medium text-slate-700" for="tanggal_field">Tanggal</label>
            <input id="tanggal_field" name="tanggal_field" type="date"
                value="{{ old('tanggal_field', $record->tanggal_field ?? '') }}"
                class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm focus:outline-2 focus:outline-blue-600">
        </div>

        <div class="flex flex-col gap-2">
            <label class="text-sm font-medium text-slate-700" for="pilihan_field">Pilihan</label>
            <select id="pilihan_field" name="pilihan_field"
                class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm focus:outline-2 focus:outline-blue-600">
                <option value="">Pilih data</option>
                {{-- Ganti $pilihan, $opsi, id, dan nama sesuai data dropdown. --}}
                @foreach ($pilihan as $opsi)
                    <option value="{{ $opsi->id }}" @selected(old('pilihan_field', $record->pilihan_field ?? '') == $opsi->id)>{{ $opsi->nama }}</option>
                @endforeach
            </select>
        </div>

        {{-- Contoh enum: sesuaikan condition, nilai option, dan $record dengan field/model. --}}
        <div class="flex flex-col gap-2">
            <label class="text-sm font-medium text-slate-700" for="condition">Kondisi</label>
            <select id="condition" name="condition"
                class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm focus:outline-2 focus:outline-blue-600">
                <option value="baik" @selected(old('condition', $record->condition ?? 'baik') == 'baik')>Baik</option>
                <option value="rusak_ringan" @selected(old('condition', $record->condition ?? 'baik') == 'rusak_ringan')>Rusak Ringan</option>
                <option value="rusak_berat" @selected(old('condition', $record->condition ?? 'baik') == 'rusak_berat')>Rusak Berat</option>
            </select>
        </div>

        <div class="flex flex-col gap-2">
            <label class="text-sm font-medium text-slate-700" for="catatan_field">Catatan</label>
            <textarea id="catatan_field" name="catatan_field" rows="3"
                class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm focus:outline-2 focus:outline-blue-600">{{ old('catatan_field', $record->catatan_field ?? '') }}</textarea>
        </div>

        {{-- Tambahkan required/min/max sesuai kebutuhan; validasi backend tetap wajib. --}}
        <div class="flex flex-wrap items-center gap-4">
            <button type="submit"
                class="rounded-lg bg-blue-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-blue-700">Simpan</button>
            <a href="#" class="px-4 py-2.5 text-sm font-medium text-slate-600 hover:text-blue-700">Batal</a>
        </div>
    </form>
@endsection
