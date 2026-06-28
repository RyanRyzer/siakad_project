@extends('layouts.app')

@section('content')

<div class="flex justify-between items-center mb-6">

    <h1 class="text-3xl font-bold">

        Approval KRS

    </h1>

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

<th class="p-4">

Mahasiswa

</th>

<th class="p-4">

Tahun Akademik

</th>

<th class="p-4">

Status

</th>

<th class="p-4">

Aksi

</th>

</tr>

</thead>

<tbody>

@foreach($krs as $item)

<tr class="border-b">

<td class="p-4">

{{ $item->mahasiswa->nama }}

</td>

<td class="p-4">

{{ $item->tahunAkademik->tahun }}

-

{{ $item->tahunAkademik->semester }}

</td>

<td class="p-4">

{{ $item->status }}

</td>

<td class="p-4">

<a
href="{{ route('dosen.krs.show',$item) }}"
class="bg-blue-600 text-white px-4 py-2 rounded">

Detail

</a>

</td>

</tr>

@endforeach

</tbody>

</table>

{{ $krs->links() }}

</div>

@endsection