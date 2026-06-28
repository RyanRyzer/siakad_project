@extends('layouts.app')

@section('content')

<div class="mb-8">

    <h1 class="text-3xl font-bold">

        Dashboard Mahasiswa

    </h1>

    <p class="text-gray-500 mt-2">

        Selamat datang,

        {{ $mahasiswa->nama }}

    </p>

</div>

<div class="grid grid-cols-4 gap-6">

    <div class="bg-white rounded-xl shadow p-6">

        <p class="text-gray-500">

            Semester

        </p>

        <h2 class="text-4xl font-bold mt-2">

            {{ $semester }}

        </h2>

    </div>

    <div class="bg-white rounded-xl shadow p-6">

        <p class="text-gray-500">

            Total KRS

        </p>

        <h2 class="text-4xl font-bold mt-2">

            {{ $totalKrs }}

        </h2>

    </div>

    <div class="bg-white rounded-xl shadow p-6">

        <p class="text-gray-500">

            Nilai Masuk

        </p>

        <h2 class="text-4xl font-bold mt-2">

            {{ $totalNilai }}

        </h2>

    </div>

    <div class="bg-white rounded-xl shadow p-6">

        <p class="text-gray-500">

            Status

        </p>

        <h2 class="text-2xl font-bold mt-2">

            {{ $status }}

        </h2>

    </div>

</div>

<div class="grid grid-cols-2 gap-6 mt-8">

    <a
        href="{{ route('mahasiswa.krs.index') }}"
        class="bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl p-8 text-center text-xl font-bold">

        Isi KRS

    </a>

    <a
        href="#"
        class="bg-green-600 hover:bg-green-700 text-white rounded-xl p-8 text-center text-xl font-bold">

        Lihat KHS

    </a>

</div>

@endsection