@extends('layouts.app')

@section('content')

<div class="max-w-5xl mx-auto">

    <div class="flex justify-between items-center mb-8">

        <div>

            <h1 class="text-3xl font-bold text-slate-800">

                Edit Dosen

            </h1>

            <p class="text-gray-500 mt-1">

                Perbarui data dosen.

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
            action="{{ route('admin.dosen.update',$dosen) }}"
            method="POST">

            @csrf
            @method('PUT')

            <div class="p-8 grid grid-cols-2 gap-6">

                <div>

                    <label class="block mb-2 font-semibold">

                        Akun User

                    </label>

                    <select
                        name="user_id"
                        class="w-full border rounded-lg px-4 py-3"
                        required>

                        @foreach($users as $user)

                        <option
                            value="{{ $user->id }}"
                            @selected($dosen->user_id==$user->id)>

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
                        class="w-full border rounded-lg px-4 py-3">

                        @foreach($programStudi as $item)

                        <option
                            value="{{ $item->id }}"
                            @selected($dosen->program_studi_id==$item->id)>

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
                        value="{{ old('nidn',$dosen->nidn) }}"
                        class="w-full border rounded-lg px-4 py-3">

                </div>

                <div>

                    <label class="block mb-2 font-semibold">

                        Nama Lengkap

                    </label>

                    <input
                        type="text"
                        name="nama"
                        value="{{ old('nama',$dosen->nama) }}"
                        class="w-full border rounded-lg px-4 py-3">

                </div>

                <div>

                    <label class="block mb-2 font-semibold">

                        Gelar

                    </label>

                    <input
                        type="text"
                        name="gelar"
                        value="{{ old('gelar',$dosen->gelar) }}"
                        class="w-full border rounded-lg px-4 py-3">

                </div>

                <div>

                    <label class="block mb-2 font-semibold">

                        Jenis Kelamin

                    </label>

                    <select
                        name="jenis_kelamin"
                        class="w-full border rounded-lg px-4 py-3">

                        <option value="L" @selected($dosen->jenis_kelamin=='L')>

                            Laki-laki

                        </option>

                        <option value="P" @selected($dosen->jenis_kelamin=='P')>

                            Perempuan

                        </option>

                    </select>

                </div>

                <div>

                    <label class="block mb-2 font-semibold">

                        Tempat Lahir

                    </label>

                    <input
                        type="text"
                        name="tempat_lahir"
                        value="{{ old('tempat_lahir',$dosen->tempat_lahir) }}"
                        class="w-full border rounded-lg px-4 py-3">

                </div>

                <div>

                    <label class="block mb-2 font-semibold">

                        Tanggal Lahir

                    </label>

                    <input
                        type="date"
                        name="tanggal_lahir"
                        value="{{ old('tanggal_lahir',$dosen->tanggal_lahir) }}"
                        class="w-full border rounded-lg px-4 py-3">

                </div>
                                <div class="col-span-2">

                    <label class="block mb-2 font-semibold">

                        Alamat

                    </label>

                    <textarea
                        name="alamat"
                        rows="3"
                        class="w-full border rounded-lg px-4 py-3">{{ old('alamat',$dosen->alamat) }}</textarea>

                </div>

                <div>

                    <label class="block mb-2 font-semibold">

                        Email

                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email',$dosen->email) }}"
                        class="w-full border rounded-lg px-4 py-3">

                </div>

                <div>

                    <label class="block mb-2 font-semibold">

                        No. HP

                    </label>

                    <input
                        type="text"
                        name="no_hp"
                        value="{{ old('no_hp',$dosen->no_hp) }}"
                        class="w-full border rounded-lg px-4 py-3">

                </div>

                <div>

                    <label class="block mb-2 font-semibold">

                        Status

                    </label>

                    <select
                        name="status"
                        class="w-full border rounded-lg px-4 py-3">

                        <option value="Aktif" @selected($dosen->status=='Aktif')>

                            Aktif

                        </option>

                        <option value="Cuti" @selected($dosen->status=='Cuti')>

                            Cuti

                        </option>

                        <option value="Pensiun" @selected($dosen->status=='Pensiun')>

                            Pensiun

                        </option>

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

                        Update Dosen

                    </button>

                </div>

            </div>

        </form>

    </div>

</div>

@endsection