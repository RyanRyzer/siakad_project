@extends('layouts.app')

@section('content')

<div class="max-w-5xl mx-auto">

    <div class="flex justify-between items-center mb-8">

        <div>

            <h1 class="text-3xl font-bold text-slate-800">

                Tambah Dosen

            </h1>

            <p class="text-gray-500 mt-1">

                Tambahkan data dosen baru.

            </p>

        </div>

        <a
            href="{{ route('admin.dosen.index') }}"
            class="bg-slate-600 hover:bg-slate-700 text-white px-5 py-3 rounded-lg">

            Kembali

        </a>

    </div>

    @if($errors->any())

    <div class="bg-red-100 border border-red-300 text-red-700 rounded-lg p-4 mb-6">

        <ul class="list-disc ml-5">

            @foreach($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

    @endif

    <div class="bg-white rounded-xl shadow">

        <form
            action="{{ route('admin.dosen.store') }}"
            method="POST">

            @csrf

            <div class="p-8 grid grid-cols-2 gap-6">

                <div>

                    <label class="block mb-2 font-semibold">

                        Akun User

                    </label>

                    <select
                        name="user_id"
                        class="w-full border rounded-lg px-4 py-3"
                        required>

                        <option value="">Pilih User</option>

                        @foreach($users as $user)

                        <option
                            value="{{ $user->id }}"
                            @selected(old('user_id')==$user->id)>

                            {{ $user->username }} - {{ $user->name }}

                        </option>

                        @endforeach

                    </select>

                </div>

                <div>

                    <label class="block mb-2 font-semibold">

                        Program Studi

                    </label>

                    <select
                        name="program_studi_id"
                        class="w-full border rounded-lg px-4 py-3"
                        required>

                        <option value="">Pilih Program Studi</option>

                        @foreach($programStudi as $item)

                        <option
                            value="{{ $item->id }}"
                            @selected(old('program_studi_id')==$item->id)>

                            {{ $item->nama_prodi }}

                        </option>

                        @endforeach

                    </select>

                </div>

                <div>

                    <label class="block mb-2 font-semibold">

                        NIDN

                    </label>

                    <input
                        type="text"
                        name="nidn"
                        value="{{ old('nidn') }}"
                        class="w-full border rounded-lg px-4 py-3"
                        required>

                </div>

                <div>

                    <label class="block mb-2 font-semibold">

                        Nama Lengkap

                    </label>

                    <input
                        type="text"
                        name="nama"
                        value="{{ old('nama') }}"
                        class="w-full border rounded-lg px-4 py-3"
                        required>

                </div>

                <div>

                    <label class="block mb-2 font-semibold">

                        Gelar

                    </label>

                    <input
                        type="text"
                        name="gelar"
                        value="{{ old('gelar') }}"
                        class="w-full border rounded-lg px-4 py-3">

                </div>

                <div>

                    <label class="block mb-2 font-semibold">

                        Jenis Kelamin

                    </label>

                    <select
                        name="jenis_kelamin"
                        class="w-full border rounded-lg px-4 py-3">

                        <option value="L">Laki-laki</option>

                        <option value="P">Perempuan</option>

                    </select>

                </div>
                                <div>

                    <label class="block mb-2 font-semibold">

                        Tempat Lahir

                    </label>

                    <input
                        type="text"
                        name="tempat_lahir"
                        value="{{ old('tempat_lahir') }}"
                        class="w-full border rounded-lg px-4 py-3">

                </div>

                <div>

                    <label class="block mb-2 font-semibold">

                        Tanggal Lahir

                    </label>

                    <input
                        type="date"
                        name="tanggal_lahir"
                        value="{{ old('tanggal_lahir') }}"
                        class="w-full border rounded-lg px-4 py-3">

                </div>

                <div class="col-span-2">

                    <label class="block mb-2 font-semibold">

                        Alamat

                    </label>

                    <textarea
                        name="alamat"
                        rows="3"
                        class="w-full border rounded-lg px-4 py-3">{{ old('alamat') }}</textarea>

                </div>

                <div>

                    <label class="block mb-2 font-semibold">

                        Email

                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        class="w-full border rounded-lg px-4 py-3">

                </div>

                <div>

                    <label class="block mb-2 font-semibold">

                        No. HP

                    </label>

                    <input
                        type="text"
                        name="no_hp"
                        value="{{ old('no_hp') }}"
                        class="w-full border rounded-lg px-4 py-3">

                </div>

                <div>

                    <label class="block mb-2 font-semibold">

                        Status

                    </label>

                    <select
                        name="status"
                        class="w-full border rounded-lg px-4 py-3">

                        <option value="Aktif">Aktif</option>

                        <option value="Cuti">Cuti</option>

                        <option value="Pensiun">Pensiun</option>

                    </select>

                </div>

                <div class="col-span-2 flex justify-end gap-3 pt-6 border-t">

                    <a
                        href="{{ route('admin.dosen.index') }}"
                        class="px-6 py-3 rounded-lg bg-gray-300 hover:bg-gray-400 text-gray-800">

                        Batal

                    </a>

                    <button
                        type="submit"
                        class="px-6 py-3 rounded-lg bg-indigo-600 hover:bg-indigo-700 text-white">

                        Simpan Dosen

                    </button>

                </div>

            </div>

        </form>

    </div>

</div>

@endsection