@extends('layouts.app')

@section('content')

<div class="flex justify-between items-center mb-6">

    <div>

        <h1 class="text-3xl font-bold">

            {{ $jadwal->mataKuliah->nama_mk }}

        </h1>

        <p class="text-gray-500">

            Daftar mahasiswa yang mengambil mata kuliah.

        </p>

    </div>

</div>

<div class="bg-white rounded-xl shadow overflow-hidden">

<table class="w-full">

<thead>

<tr class="bg-slate-100">

<th class="p-4">

NIM

</th>

<th class="p-4">

Nama

</th>

<th class="p-4">

Status KRS

</th>

<th class="p-4">

Aksi

</th>

</tr>

</thead>

<tbody>

@forelse($detail as $item)

<tr class="border-b">

<td class="p-4">

{{ $item->krs->mahasiswa->nim }}

</td>

<td class="p-4">

{{ $item->krs->mahasiswa->nama }}

</td>

<td class="p-4">

{{ $item->krs->status }}

</td>

<td class="p-4">

<a

href="{{ route('dosen.nilai.edit',[$jadwal->id,$item->krs->mahasiswa->id]) }}"

class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg">

Input Nilai

</a>

</td>

</tr>

@empty

<tr>

<td colspan="4" class="text-center py-8">

Belum ada mahasiswa.

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

@endsection