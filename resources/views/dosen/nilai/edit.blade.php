@extends('layouts.app')

@section('content')

<div class="max-w-xl mx-auto">

<div class="bg-white rounded-xl shadow">

<form

action="{{ route('dosen.nilai.update',[$nilai->jadwal_id,$nilai->mahasiswa_id]) }}"

method="POST">

@csrf

@method('PUT')

<div class="p-8">

<h1 class="text-3xl font-bold mb-8">

Input Nilai

</h1>

<div>

<label class="block mb-2 font-semibold">

Nilai Angka

</label>

<input

type="number"

name="nilai_angka"

min="0"

max="100"

step="0.01"

value="{{ old('nilai_angka',$nilai->nilai_angka) }}"

class="w-full border rounded-lg px-4 py-3"

required>

</div>

<div class="mt-8 flex justify-end gap-3">

<a

href="{{ url()->previous() }}"

class="bg-gray-300 hover:bg-gray-400 px-6 py-3 rounded-lg">

Batal

</a>

<button

type="submit"

class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-lg">

Simpan Nilai

</button>

</div>

</div>

</form>

</div>

</div>

@endsection