@extends('layouts.app')

@section('content')

<div class="bg-white rounded-xl shadow">

<div class="p-8">

<h1 class="text-3xl font-bold mb-6">

Detail KRS

</h1>

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

</tr>

</thead>

<tbody>

@php

$total=0;

@endphp

@foreach($krs->detailKrs as $detail)

@php

$total += $detail->jadwal->mataKuliah->sks;

@endphp

<tr class="border-b">

<td class="p-4">

{{ $detail->jadwal->mataKuliah->kode_mk }}

</td>

<td class="p-4">

{{ $detail->jadwal->mataKuliah->nama_mk }}

</td>

<td class="p-4 text-center">

{{ $detail->jadwal->mataKuliah->sks }}

</td>

</tr>

@endforeach

</tbody>

</table>

<div class="flex justify-between items-center mt-8">

<div>

<b>Total SKS :</b>

{{ $total }}

</div>

<div class="flex gap-3">

<form
method="POST"
action="{{ route('dosen.krs.reject',$krs) }}">

@csrf

@method('PUT')

<button
class="bg-red-600 text-white px-6 py-3 rounded-lg">

Tolak

</button>

</form>

<form
method="POST"
action="{{ route('dosen.krs.approve',$krs) }}">

@csrf

@method('PUT')

<button
class="bg-green-600 text-white px-6 py-3 rounded-lg">

Setujui

</button>

</form>

</div>

</div>

</div>

</div>

@endsection