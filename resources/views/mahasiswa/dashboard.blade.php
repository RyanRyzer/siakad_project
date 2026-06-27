@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-6">

    Dashboard Mahasiswa

</h1>

<div class="grid grid-cols-4 gap-6">

    <div class="bg-white rounded-xl shadow p-6">

        <h3 class="text-gray-500">

            IPK

        </h3>

        <p class="text-3xl font-bold mt-2">

            0.00

        </p>

    </div>

    <div class="bg-white rounded-xl shadow p-6">

        <h3 class="text-gray-500">

            Total SKS

        </h3>

        <p class="text-3xl font-bold mt-2">

            0

        </p>

    </div>

    <div class="bg-white rounded-xl shadow p-6">

        <h3 class="text-gray-500">

            Mata Kuliah

        </h3>

        <p class="text-3xl font-bold mt-2">

            0

        </p>

    </div>

    <div class="bg-white rounded-xl shadow p-6">

        <h3 class="text-gray-500">

            Status KRS

        </h3>

        <p class="text-lg font-semibold mt-2 text-green-600">

            Aktif

        </p>

    </div>

</div>

@endsection