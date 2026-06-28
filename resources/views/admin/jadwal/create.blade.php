@extends('layouts.app')

@section('content')

<div class="max-w-5xl mx-auto">

<div class="bg-white rounded-xl shadow">

<form action="{{ route('admin.jadwal.store') }}" method="POST">

@csrf

<div class="grid grid-cols-2 gap-6 p-8">

<div>

<label class="block mb-2 font-semibold">

Mata Kuliah

</label>

<select name="mata_kuliah_id" class="w-full border rounded-lg px-4 py-3">

@foreach($mataKuliah as $item)

<option value="{{ $item->id }}">

{{ $item->kode_mk }} - {{ $item->nama_mk }}

</option>

@endforeach

</select>

</div>

<div>

<label class="block mb-2 font-semibold">

Dosen

</label>

<select name="dosen_id" class="w-full border rounded-lg px-4 py-3">

@foreach($dosen as $item)

<option value="{{ $item->id }}">

{{ $item->nama }}

</option>

@endforeach

</select>

</div>

<div>

<label class="block mb-2 font-semibold">

Tahun Akademik

</label>

<select name="tahun_akademik_id" class="w-full border rounded-lg px-4 py-3">

@foreach($tahunAkademik as $item)

<option value="{{ $item->id }}">

{{ $item->tahun }}

-

{{ $item->semester }}

</option>

@endforeach

</select>

</div>

<div>

<label class="block mb-2 font-semibold">

Hari

</label>

<select name="hari" class="w-full border rounded-lg px-4 py-3">

<option>Senin</option>

<option>Selasa</option>

<option>Rabu</option>

<option>Kamis</option>

<option>Jumat</option>

<option>Sabtu</option>

</select>

</div>

<div>

<label class="block mb-2 font-semibold">

Jam Mulai

</label>

<input
type="time"
name="jam_mulai"
class="w-full border rounded-lg px-4 py-3">

</div>

<div>

<label class="block mb-2 font-semibold">

Jam Selesai

</label>

<input
type="time"
name="jam_selesai"
class="w-full border rounded-lg px-4 py-3">

</div>

<div class="col-span-2 flex justify-end gap-3">

<a
href="{{ route('admin.jadwal.index') }}"
class="px-6 py-3 bg-gray-300 rounded-lg">

Batal

</a>

<button
class="px-6 py-3 bg-indigo-600 text-white rounded-lg">

Simpan Jadwal

</button>

</div>

</div>

</form>

</div>

</div>

@endsection