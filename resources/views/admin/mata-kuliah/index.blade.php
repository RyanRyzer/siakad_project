@extends('layouts.app')

@section('content')

<div class="flex items-center justify-between mb-6">

    <div>

        <h1 class="text-3xl font-bold text-slate-800">

            Data Mata Kuliah

        </h1>

        <p class="text-gray-500">

            Kelola seluruh mata kuliah.

        </p>

    </div>

    <a
        href="{{ route('admin.mata-kuliah.create') }}"
        class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-3 rounded-lg">

        + Tambah Mata Kuliah

    </a>

</div>

@if(session('success'))

<div class="bg-green-100 border border-green-300 rounded-lg p-4 mb-6 text-green-700">

    {{ session('success') }}

</div>

@endif

<div class="bg-white rounded-xl shadow">

    <div class="p-6 border-b">

        <form>

            <div class="flex gap-4">

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Cari kode atau nama mata kuliah..."
                    class="w-full border rounded-lg px-4 py-3">

                <button
                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 rounded-lg">

                    Cari

                </button>

            </div>

        </form>

    </div>

    <div class="overflow-x-auto">

        <table class="w-full">

            <thead>

                <tr class="bg-slate-100">

                    <th class="px-6 py-4">Kode</th>

                    <th class="px-6 py-4">Mata Kuliah</th>

                    <th class="px-6 py-4">Program Studi</th>

                    <th class="px-6 py-4">Semester</th>

                    <th class="px-6 py-4">SKS</th>

                    <th class="px-6 py-4 text-center">Aksi</th>

                </tr>

            </thead>

            <tbody>

                @forelse($mataKuliah as $item)

                <tr class="border-b hover:bg-slate-50">

                    <td class="px-6 py-4">

                        {{ $item->kode_mk }}

                    </td>

                    <td class="px-6 py-4">

                        {{ $item->nama_mk }}

                    </td>

                    <td class="px-6 py-4">

                        {{ $item->programStudi->nama_prodi }}

                    </td>

                    <td class="px-6 py-4">

                        {{ $item->semester }}

                    </td>

                    <td class="px-6 py-4">

                        {{ $item->sks }}

                    </td>

                    <td class="px-6 py-4">

                        <div class="flex justify-center gap-2">

                            <a
                                href="{{ route('admin.mata-kuliah.edit',$item) }}"
                                class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg">

                                Edit

                            </a>

                            <form
                                action="{{ route('admin.mata-kuliah.destroy',$item) }}"
                                method="POST">

                                @csrf

                                @method('DELETE')

                                <button
                                    onclick="return confirm('Yakin?')"
                                    class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg">

                                    Hapus

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="6" class="text-center py-10">

                        Belum ada data.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    <div class="p-6 border-t">

        {{ $mataKuliah->links() }}

    </div>

</div>

@endsection