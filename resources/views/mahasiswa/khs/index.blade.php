@extends('layouts.app')

@section('content')

<div class="flex justify-between items-center mb-8">

    <div>

        <h1 class="text-3xl font-bold">

            Kartu Hasil Studi

        </h1>

        <p class="text-gray-500">

            Nilai hasil perkuliahan.

        </p>

    </div>

</div>

<div class="grid grid-cols-3 gap-6 mb-8">

    <div class="bg-white rounded-xl shadow p-6">

        <p class="text-gray-500">

            Total SKS

        </p>

        <h2 class="text-4xl font-bold mt-2">

            {{ $totalSks }}

        </h2>

    </div>

    <div class="bg-white rounded-xl shadow p-6">

        <p class="text-gray-500">

            IP Semester

        </p>

        <h2 class="text-4xl font-bold mt-2">

            {{ $ip }}

        </h2>

    </div>

    <div class="bg-white rounded-xl shadow p-6">

        <p class="text-gray-500">

            Mata Kuliah

        </p>

        <h2 class="text-4xl font-bold mt-2">

            {{ $nilai->count() }}

        </h2>

    </div>

</div>

<div class="bg-white rounded-xl shadow overflow-hidden">

<table class="w-full">

<thead>

<tr class="bg-slate-100">

<th class="p-4">

Kode

</th>

<th class="p-4">

Mata Kuliah

</th>

<th class="p-4">

SKS

</th>

<th class="p-4">

Nilai Angka

</th>

<th class="p-4">

Nilai Huruf

</th>

</tr>

</thead>

<tbody>

@forelse($nilai as $item)

<tr class="border-b">

<td class="p-4">

{{ $item->jadwal->mataKuliah->kode_mk }}

</td>

<td class="p-4">

{{ $item->jadwal->mataKuliah->nama_mk }}

</td>

<td class="text-center">

{{ $item->jadwal->mataKuliah->sks }}

</td>

<td class="text-center">

{{ $item->nilai_angka }}

</td>

<td class="text-center font-bold">

{{ $item->nilai_huruf }}

</td>

</tr>

@empty

<tr>

<td colspan="5" class="text-center py-10">

Belum ada nilai.

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

@endsection