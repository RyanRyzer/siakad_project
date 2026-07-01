@extends('layouts.app')

@section('content')

<div class="flex justify-between items-center mb-6">

    <div>

        <h1 class="text-3xl font-bold">

            {{ $jadwal->mataKuliah->nama_mk }}

        </h1>

        <p class="text-gray-500 mt-2">

            Daftar mahasiswa peserta mata kuliah.

        </p>

    </div>

</div>

@if(session('success'))

<div class="mb-6 bg-green-100 border border-green-300 text-green-700 rounded-lg px-4 py-3">

    {{ session('success') }}

</div>

@endif

<div class="bg-white rounded-xl shadow overflow-hidden">

<table class="w-full">

<thead>

<tr class="bg-slate-100">

<th class="p-4">

NIM

</th>

<th class="p-4">

Nama Mahasiswa

</th>

<th class="p-4 text-center">

Status

</th>

<th class="p-4 text-center">

Nilai

</th>

<th class="p-4 text-center">

Huruf

</th>

<th class="p-4 text-center">

Aksi

</th>

</tr>

</thead>

<tbody>

@forelse($detail as $item)

@php

$nilai = $item->nilai;

@endphp

<tr class="border-b">

<td class="p-4">

{{ $item->krs->mahasiswa->nim }}

</td>

<td class="p-4">

{{ $item->krs->mahasiswa->nama }}

</td>

<td class="text-center">

<span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm">

{{ $item->krs->status }}

</span>

</td>

<td class="text-center font-semibold">

{{ $nilai?->nilai_angka ?? '-' }}

</td>

<td class="text-center font-bold">

{{ $nilai?->nilai_huruf ?? '-' }}

</td>

<td class="text-center">
                            @if($nilai)

                            <a

                                href="{{ route('dosen.nilai.edit',[
                                    $jadwal->id,
                                    $item->krs->mahasiswa->id
                                ]) }}"

                                class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition">

                                Edit Nilai

                            </a>

                        @else

                            <a

                                href="{{ route('dosen.nilai.edit',[
                                    $jadwal->id,
                                    $item->krs->mahasiswa->id
                                ]) }}"

                                class="inline-flex items-center bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition">

                                Input Nilai

                            </a>

                        @endif

                    </td>

                </tr>

            @empty

                <tr>

                    <td
                        colspan="6"
                        class="text-center py-10 text-gray-500">

                        Belum ada mahasiswa yang mengambil mata kuliah ini.

                    </td>

                </tr>

            @endforelse

        </tbody>

        @if($detail->count())

        <tfoot>

            <tr class="bg-slate-50">

                <td colspan="6" class="px-4 py-3 text-sm text-gray-500">

                    Total Mahasiswa :

                    <span class="font-semibold">

                        {{ $detail->count() }}

                    </span>

                </td>

            </tr>

        </tfoot>

        @endif

    </table>

</div>
@endsection