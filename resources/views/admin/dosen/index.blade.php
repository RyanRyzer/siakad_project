@extends('layouts.app')

@section('content')

<div class="flex items-center justify-between mb-6">

    <div>

        <h1 class="text-3xl font-bold text-slate-800">

            Data Dosen

        </h1>

        <p class="text-gray-500 mt-1">

            Kelola seluruh data dosen.

        </p>

    </div>

    <a
        href="{{ route('admin.dosen.create') }}"
        class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-3 rounded-lg shadow">

        + Tambah Dosen

    </a>

</div>

@if(session('success'))

<div class="bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded-lg mb-5">

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
                    placeholder="Cari NIDN atau Nama Dosen..."
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

                    <th class="px-6 py-4 text-left">No</th>

                    <th class="px-6 py-4 text-left">NIDN</th>

                    <th class="px-6 py-4 text-left">Nama</th>

                    <th class="px-6 py-4 text-left">Program Studi</th>

                    <th class="px-6 py-4 text-left">Status</th>

                    <th class="px-6 py-4 text-center">Aksi</th>

                </tr>

            </thead>

            <tbody>

                @forelse($dosen as $item)

                <tr class="border-b hover:bg-slate-50">

                    <td class="px-6 py-4">

                        {{ $loop->iteration + ($dosen->currentPage()-1) * $dosen->perPage() }}

                    </td>

                    <td class="px-6 py-4 font-semibold">

                        {{ $item->nidn }}

                    </td>

                    <td class="px-6 py-4">

                        {{ $item->nama }}

                    </td>

                    <td class="px-6 py-4">

                        {{ $item->programStudi->nama_prodi ?? '-' }}

                    </td>

                    <td class="px-6 py-4">

                        @if($item->status=='Aktif')

                            <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm">

                                Aktif

                            </span>

                        @elseif($item->status=='Cuti')

                            <span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-sm">

                                Cuti

                            </span>

                        @else

                            <span class="px-3 py-1 rounded-full bg-red-100 text-red-700 text-sm">

                                Pensiun

                            </span>

                        @endif

                    </td>

                    <td class="px-6 py-4">

                        <div class="flex justify-center gap-2">

                            <a
                                href="{{ route('admin.dosen.edit',$item) }}"
                                class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg">

                                Edit

                            </a>

                            <form
                                action="{{ route('admin.dosen.destroy',$item) }}"
                                method="POST">

                                @csrf

                                @method('DELETE')

                                <button
                                    onclick="return confirm('Yakin ingin menghapus data dosen ini?')"
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
                        class="py-12 text-center">

                        <div class="flex flex-col items-center">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="w-16 h-16 text-slate-300 mb-4"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor">

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.5"
                                    d="M9 17v-2a4 4 0 014-4h5m-5-4V5m0 2H8a2 2 0 00-2 2v8a2 2 0 002 2h5"/>

                            </svg>

                            <h2 class="text-xl font-semibold text-slate-600">

                                Belum Ada Data Dosen

                            </h2>

                            <p class="text-gray-400 mt-2">

                                Silahkan tambahkan data dosen terlebih dahulu.

                            </p>

                            <a
                                href="{{ route('admin.dosen.create') }}"
                                class="mt-6 bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-3 rounded-lg">

                                + Tambah Dosen

                            </a>

                        </div>

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    <div class="border-t px-6 py-4 flex justify-between items-center">

        <div class="text-sm text-gray-500">

            Menampilkan

            {{ $dosen->firstItem() ?? 0 }}

            -

            {{ $dosen->lastItem() ?? 0 }}

            dari

            {{ $dosen->total() }}

            data

        </div>

        {{ $dosen->links() }}

    </div>

</div>

@endsection