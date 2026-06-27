@extends('layouts.app')

@section('content')

<div class="mb-8">

    <h1 class="text-3xl font-bold text-slate-800">

        Dashboard Admin

    </h1>

    <p class="text-gray-500 mt-2">

        Selamat datang kembali, <strong>{{ auth()->user()->name }}</strong>.

    </p>

</div>

<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-8">

    <div class="bg-white rounded-xl shadow p-6 border-l-4 border-indigo-600">

        <p class="text-gray-500">

            Total User

        </p>

        <h2 class="text-4xl font-bold mt-3 text-slate-800">

            {{ $totalUsers }}

        </h2>

    </div>

    <div class="bg-white rounded-xl shadow p-6 border-l-4 border-blue-600">

        <p class="text-gray-500">

            Total Dosen

        </p>

        <h2 class="text-4xl font-bold mt-3 text-slate-800">

            {{ $totalDosen }}

        </h2>

    </div>

    <div class="bg-white rounded-xl shadow p-6 border-l-4 border-green-600">

        <p class="text-gray-500">

            Total Mahasiswa

        </p>

        <h2 class="text-4xl font-bold mt-3 text-slate-800">

            {{ $totalMahasiswa }}

        </h2>

    </div>

    <div class="bg-white rounded-xl shadow p-6 border-l-4 border-orange-500">

        <p class="text-gray-500">

            Mata Kuliah

        </p>

        <h2 class="text-4xl font-bold mt-3 text-slate-800">

            {{ $totalMatkul }}

        </h2>

    </div>

</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    <div class="lg:col-span-2 bg-white rounded-xl shadow">

        <div class="border-b px-6 py-4">

            <h2 class="text-xl font-semibold">

                Selamat Datang

            </h2>

        </div>

        <div class="p-6">

            <p class="text-gray-600 leading-8">

                Sistem Informasi Akademik (SIAKAD) digunakan untuk mengelola seluruh aktivitas akademik kampus seperti data mahasiswa, dosen, program studi, mata kuliah, jadwal perkuliahan, KRS, KHS, hingga pengolahan nilai.

            </p>

            <div class="grid grid-cols-2 gap-4 mt-8">

                <div class="bg-slate-100 rounded-lg p-4">

                    <h4 class="font-semibold">

                        Status Sistem

                    </h4>

                    <p class="text-green-600 mt-2 font-bold">

                        Online

                    </p>

                </div>

                <div class="bg-slate-100 rounded-lg p-4">

                    <h4 class="font-semibold">

                        Role Login

                    </h4>

                    <p class="text-indigo-600 mt-2 font-bold capitalize">

                        {{ auth()->user()->role }}

                    </p>

                </div>

            </div>

        </div>

    </div>

    <div class="bg-white rounded-xl shadow">

        <div class="border-b px-6 py-4">

            <h2 class="text-xl font-semibold">

                Menu Cepat

            </h2>

        </div>

        <div class="p-6 space-y-3">

            <a
                href="{{ route('admin.users.index') }}"
                class="block bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg px-4 py-3">

                Kelola User

            </a>

            <a
                href="#"
                class="block bg-blue-600 hover:bg-blue-700 text-white rounded-lg px-4 py-3">

                Kelola Dosen

            </a>

            <a
                href="#"
                class="block bg-green-600 hover:bg-green-700 text-white rounded-lg px-4 py-3">

                Kelola Mahasiswa

            </a>

            <a
                href="#"
                class="block bg-orange-500 hover:bg-orange-600 text-white rounded-lg px-4 py-3">

                Mata Kuliah

            </a>

        </div>

    </div>

</div>

@endsection