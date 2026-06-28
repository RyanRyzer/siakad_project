@extends('layouts.app')

@section('content')

<div class="flex justify-between items-center mb-6">

    <div>

        <h1 class="text-3xl font-bold">

            Kartu Rencana Studi

        </h1>

        <p class="text-gray-500">

            Riwayat pengisian KRS.

        </p>

    </div>

    <a href="{{ route('mahasiswa.krs.create') }}"
        class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-3 rounded-lg">

        + Isi KRS

    </a>

</div>

@if(session('success'))

<div class="bg-green-100 border border-green-300 text-green-700 rounded-lg p-4 mb-6">

    {{ session('success') }}

</div>

@endif

<div class="bg-white rounded-xl shadow overflow-hidden">

<table class="w-full">

<thead>

<tr class="bg-slate-100">

<th class="p-4">Semester</th>

<th class="p-4">Tanggal</th>

<th class="p-4">Status</th>

<th class="p-4 text-center">Aksi</th>

</tr>

</thead>

<tbody>

@forelse($krs as $item)

<tr class="border-b">

<td class="p-4">

{{ $item->tahunAkademik->tahun }}

-

{{ $item->tahunAkademik->semester }}

</td>

<td class="p-4">

{{ $item->tanggal_pengisian }}

</td>

<td class="p-4">

@if($item->status=="Draft")

<span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded">

Draft

</span>

@elseif($item->status=="Disetujui")

<span class="bg-green-100 text-green-700 px-3 py-1 rounded">

Disetujui

</span>

@else

<span class="bg-red-100 text-red-700 px-3 py-1 rounded">

Ditolak

</span>

@endif

</td>

<td class="p-4 flex justify-center gap-2">

<a

href="{{ route('mahasiswa.krs.show',$item) }}"

class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">

Detail

</a>

@if($item->status=="Draft")

<form

method="POST"

action="{{ route('mahasiswa.krs.destroy',$item) }}">

@csrf

@method('DELETE')

<button

onclick="return confirm('Yakin hapus KRS?')"

class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">

Hapus

</button>

</form>

@endif

</td>

</tr>

@empty

<tr>

<td colspan="4" class="text-center py-10">

Belum ada KRS.

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

@endsection