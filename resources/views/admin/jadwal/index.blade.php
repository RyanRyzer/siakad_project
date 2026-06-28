@extends('layouts.app')

@section('content')

<div class="flex justify-between items-center mb-6">

    <div>

        <h1 class="text-3xl font-bold text-slate-800">

            Jadwal Perkuliahan

        </h1>

        <p class="text-gray-500">

            Kelola seluruh jadwal perkuliahan.

        </p>

    </div>

    <a
        href="{{ route('admin.jadwal.create') }}"
        class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-3 rounded-lg">

        + Tambah Jadwal

    </a>

</div>

@if(session('success'))

<div class="bg-green-100 border border-green-300 text-green-700 rounded-lg p-4 mb-6">

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
                    placeholder="Cari Mata Kuliah..."
                    class="w-full border rounded-lg px-4 py-3">

                <button
                    class="bg-indigo-600 text-white px-6 rounded-lg">

                    Cari

                </button>

            </div>

        </form>

    </div>

    <div class="overflow-x-auto">

        <table class="w-full">

            <thead>

                <tr class="bg-slate-100">

                    <th class="px-6 py-4">Hari</th>

                    <th class="px-6 py-4">Jam</th>

                    <th class="px-6 py-4">Mata Kuliah</th>

                    <th class="px-6 py-4">Dosen</th>

                    <th class="px-6 py-4">Tahun Akademik</th>

                    <th class="px-6 py-4 text-center">Aksi</th>

                </tr>

            </thead>

            <tbody>

                @forelse($jadwal as $item)

                <tr class="border-b hover:bg-slate-50">

                    <td class="px-6 py-4">

                        {{ $item->hari }}

                    </td>

                    <td class="px-6 py-4">

                        {{ substr($item->jam_mulai,0,5) }}

                        -

                        {{ substr($item->jam_selesai,0,5) }}

                    </td>

                    <td class="px-6 py-4">

                        {{ $item->mataKuliah->nama_mk }}

                    </td>

                    <td class="px-6 py-4">

                        {{ $item->dosen->nama }}

                    </td>

                    <td class="px-6 py-4">

                        {{ $item->tahunAkademik->tahun }}

                        -

                        {{ $item->tahunAkademik->semester }}

                    </td>

                    <td class="px-6 py-4">

                        <div class="flex justify-center gap-2">

                            <a
                                href="{{ route('admin.jadwal.edit',$item) }}"
                                class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg">

                                Edit

                            </a>

                            <form
                                action="{{ route('admin.jadwal.destroy',$item) }}"
                                method="POST">

                                @csrf

                                @method('DELETE')

                                <button
                                    onclick="return confirm('Yakin ingin menghapus jadwal?')"
                                    class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg">

                                    Hapus

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td
                        colspan="6"
                        class="text-center py-10">

                        Belum ada jadwal.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    <div class="p-6 border-t">

        {{ $jadwal->links() }}

    </div>

</div>

@endsection