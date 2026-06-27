@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-6">

    Dashboard Dosen

</h1>

<div class="grid grid-cols-3 gap-6">

    <div class="bg-white rounded-xl shadow p-6">

        <h3 class="text-gray-500">

            Jadwal Mengajar

        </h3>

        <p class="text-3xl font-bold mt-2">

            0

        </p>

    </div>

    <div class="bg-white rounded-xl shadow p-6">

        <h3 class="text-gray-500">

            Mahasiswa

        </h3>

        <p class="text-3xl font-bold mt-2">

            0

        </p>

    </div>

    <div class="bg-white rounded-xl shadow p-6">

        <h3 class="text-gray-500">

            Nilai Belum Diinput

        </h3>

        <p class="text-3xl font-bold mt-2">

            0

        </p>

    </div>

</div>

@endsection