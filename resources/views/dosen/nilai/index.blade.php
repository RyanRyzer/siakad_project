@extends('layouts.app')

@section('content')

<div class="flex justify-between items-center mb-6">

    <div>

        <h1 class="text-3xl font-bold">

            Input Nilai

        </h1>

        <p class="text-gray-500">

            Pilih mata kuliah yang diampu.

        </p>

    </div>

</div>

<div class="bg-white rounded-xl shadow overflow-hidden">

    <table class="w-full">

        <thead>

            <tr class="bg-slate-100">

                <th class="p-4">

                    Mata Kuliah

                </th>

                <th class="p-4">

                    Hari

                </th>

                <th class="p-4">

                    Jam

                </th>

                <th class="p-4">

                    Aksi

                </th>

            </tr>

        </thead>

        <tbody>

            @forelse($jadwal as $item)

            <tr class="border-b">

                <td class="p-4">

                    {{ $item->mataKuliah->kode_mk }}

                    -

                    {{ $item->mataKuliah->nama_mk }}

                </td>

                <td class="p-4">

                    {{ $item->hari }}

                </td>

                <td class="p-4">

                    {{ substr($item->jam_mulai,0,5) }}

                    -

                    {{ substr($item->jam_selesai,0,5) }}

                </td>

                <td class="p-4">

                    <a

                        href="{{ route('dosen.nilai.mahasiswa',$item) }}"

                        class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2 rounded-lg">

                        Lihat Mahasiswa

                    </a>

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="4" class="text-center py-8">

                    Belum ada jadwal mengajar.

                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection