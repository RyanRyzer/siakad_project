@extends('layouts.app')

@section('content')

<div class="mb-8">

    <h1 class="text-3xl font-bold">

        Dashboard Dosen

    </h1>

    <p class="text-gray-500">

        Selamat datang,

        {{ $dosen->nama }}

    </p>

</div>

<div class="grid grid-cols-2 gap-6">

    <div class="bg-white rounded-xl shadow p-8">

        <p class="text-gray-500">

            Total Jadwal Mengajar

        </p>

        <h2 class="text-5xl font-bold mt-2">

            {{ $totalJadwal }}

        </h2>

    </div>

    <a
        href="#"
        class="bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl flex items-center justify-center text-2xl font-bold">

        Input Nilai

    </a>

</div>

@endsection