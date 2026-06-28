@extends('layouts.app')

@section('content')

<div class="mb-8">

    <h1 class="text-3xl font-bold text-slate-800">

        Dashboard Admin

    </h1>

    <p class="text-gray-500 mt-2">

        Selamat datang kembali,
        <span class="font-semibold">{{ auth()->user()->name }}</span>

    </p>

</div>

<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

    <div class="bg-white rounded-xl shadow p-6 border-l-4 border-indigo-600">

        <p class="text-gray-500">

            Total User

        </p>

        <h2 class="text-4xl font-bold mt-2">

            {{ $totalUsers }}

        </h2>

    </div>

    <div class="bg-white rounded-xl shadow p-6 border-l-4 border-blue-600">

        <p class="text-gray-500">

            Total Dosen

        </p>

        <h2 class="text-4xl font-bold mt-2">

            {{ $totalDosen }}

        </h2>

    </div>

    <div class="bg-white rounded-xl shadow p-6 border-l-4 border-green-600">

        <p class="text-gray-500">

            Total Mahasiswa

        </p>

        <h2 class="text-4xl font-bold mt-2">

            {{ $totalMahasiswa }}

        </h2>

    </div>

    <div class="bg-white rounded-xl shadow p-6 border-l-4 border-orange-500">

        <p class="text-gray-500">

            Total Mata Kuliah

        </p>

        <h2 class="text-4xl font-bold mt-2">

            {{ $totalMatkul }}

        </h2>

    </div>

    <div class="bg-white rounded-xl shadow p-6 border-l-4 border-pink-600">

        <p class="text-gray-500">

            Fakultas

        </p>

        <h2 class="text-4xl font-bold mt-2">

            {{ $totalFakultas }}

        </h2>

    </div>

    <div class="bg-white rounded-xl shadow p-6 border-l-4 border-cyan-600">

        <p class="text-gray-500">

            Program Studi

        </p>

        <h2 class="text-4xl font-bold mt-2">

            {{ $totalProdi }}

        </h2>

    </div>

    <div class="bg-white rounded-xl shadow p-6 border-l-4 border-red-600">

        <p class="text-gray-500">

            Jadwal

        </p>

        <h2 class="text-4xl font-bold mt-2">

            {{ $totalJadwal }}

        </h2>

    </div>

    <div class="bg-white rounded-xl shadow p-6 border-l-4 border-emerald-600">

        <p class="text-gray-500">

            Tahun Akademik

        </p>

        <h2 class="text-4xl font-bold mt-2">

            {{ $totalTahunAkademik }}

        </h2>

    </div>

</div>

<div class="grid lg:grid-cols-2 gap-6 mt-8">

    <div class="bg-white rounded-xl shadow">

        <div class="border-b p-5">

            <h2 class="text-xl font-bold">

                Informasi Sistem

            </h2>

        </div>

        <div class="p-6 space-y-3">

            <div class="flex justify-between">

                <span>Status Sistem</span>

                <span class="font-semibold text-green-600">

                    Online

                </span>

            </div>

            <div class="flex justify-between">

                <span>Role Login</span>

                <span class="font-semibold capitalize">

                    {{ auth()->user()->role }}

                </span>

            </div>

            <div class="flex justify-between">

                <span>Versi</span>

                <span class="font-semibold">

                    SIAKAD 1.0

                </span>

            </div>

        </div>

    </div>

    <div class="bg-white rounded-xl shadow">

        <div class="border-b p-5">

            <h2 class="text-xl font-bold">

                Menu Cepat

            </h2>

        </div>

        <div class="p-6 grid grid-cols-2 gap-4">

            <a href="{{ route('admin.users.index') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg p-4 text-center">

                User

            </a>

            <a href="{{ route('admin.dosen.index') }}" class="bg-blue-600 hover:bg-blue-700 text-white rounded-lg p-4 text-center">

                Dosen

            </a>

            <a href="{{ route('admin.mahasiswa.index') }}" class="bg-green-600 hover:bg-green-700 text-white rounded-lg p-4 text-center">

                Mahasiswa

            </a>

            <a href="{{ route('admin.fakultas.index') }}" class="bg-pink-600 hover:bg-pink-700 text-white rounded-lg p-4 text-center">

                Fakultas

            </a>

            <a href="{{ route('admin.program-studi.index') }}" class="bg-cyan-600 hover:bg-cyan-700 text-white rounded-lg p-4 text-center">

                Program Studi

            </a>

            <a href="{{ route('admin.mata-kuliah.index') }}" class="bg-orange-500 hover:bg-orange-600 text-white rounded-lg p-4 text-center">

                Mata Kuliah

            </a>

            <a href="{{ route('admin.tahun-akademik.index') }}" class="bg-emerald-600 hover:bg-emerald-700 text-white rounded-lg p-4 text-center">

                Tahun Akademik

            </a>

            <a href="{{ route('admin.jadwal.index') }}" class="bg-red-600 hover:bg-red-700 text-white rounded-lg p-4 text-center">

                Jadwal

            </a>

        </div>

    </div>

</div>

@endsection