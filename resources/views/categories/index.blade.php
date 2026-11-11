@extends('layouts.app')

@section('title', 'Kategori')

@section('content')
    <h1 class="text-2xl font-bold tracking-tight text-slate-900">Kategori Barang</h1>

    <a href="{{ route('categories.create') }}"
        class="self-start rounded-lg bg-blue-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-blue-700">Tambah</a>

    <div class="min-w-0 overflow-x-auto rounded-xl border border-slate-200 bg-white shadow-sm">
        <table class="w-full text-left text-sm">
            <thead class="bg-slate-100 text-xs uppercase tracking-wide text-slate-600">
                <tr>
                    <th scope="col" class="px-5 py-4">ID</th>
                    <th scope="col" class="px-5 py-4">Nama</th>
                    <th scope="col" class="px-5 py-4">Keterangan</th>
                    <th scope="col" class="px-5 py-4">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                    <tr class="border-t border-slate-100 hover:bg-slate-50">
                        <td class="px-5 py-4">{{ $category->id }}</td>
                        <td class="px-5 py-4">{{ $category->name }}</td>
                        <td class="px-5 py-4">{{ $category->description ?? '-' }}</td>
                        {{-- <td class="px-5 py-4">
                            <div class="flex items-center gap-4">
                                <a href="{{ route('categories.edit' . $category) }}"
                                    class="font-medium text-blue-700 hover:underline">Edit</a>
                                <form action="{{ route('categories.destroy' . $category) }}" method="POST"
                                    onsubmit="return confirm('Hapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="font-medium text-red-700 hover:underline">Hapus</button>
                                </form>
                            </div>
                        </td> --}}
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-5 py-10 text-center text-slate-500">Belum ada data.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
