@extends('layouts.app')

@section('content')

<div class="max-w-6xl mx-auto">

    <div class="flex justify-between items-center mb-8">

        <div>

            <h1 class="text-3xl font-bold text-slate-800">

                Edit Mahasiswa

            </h1>

            <p class="text-gray-500">

                Perbarui data mahasiswa.

            </p>

        </div>

        <a
            href="{{ route('admin.mahasiswa.index') }}"
            class="bg-slate-600 hover:bg-slate-700 text-white px-5 py-3 rounded-lg">

            Kembali

        </a>

    </div>

    @if($errors->any())

    <div class="bg-red-100 border border-red-300 rounded-lg p-4 mb-6">

        <ul class="list-disc ml-5">

            @foreach($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

    @endif

    <div class="bg-white rounded-xl shadow">

        <form
            action="{{ route('admin.mahasiswa.update',$mahasiswa) }}"
            method="POST">

            @csrf
            @method('PUT')

            <div class="grid grid-cols-2 gap-6 p-8">

                <div>

                    <label class="block mb-2 font-semibold">

                        Akun User

                    </label>

                    <select
                        name="user_id"
                        class="w-full border rounded-lg px-4 py-3">

                        @foreach($users as $user)

                        <option
                            value="{{ $user->id }}"
                            @selected($mahasiswa->user_id==$user->id)>

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
                            @selected($mahasiswa->program_studi_id==$item->id)>

                            {{ $item->nama_prodi }}

                        </option>

                        @endforeach

                    </select>

                </div>

                <div>

                    <label class="block mb-2 font-semibold">

                        Dosen Wali

                    </label>

                    <select
                        name="dosen_id"
                        class="w-full border rounded-lg px-4 py-3">

                        <option value="">Belum Ada</option>

                        @foreach($dosen as $item)

                        <option
                            value="{{ $item->id }}"
                            @selected($mahasiswa->dosen_id==$item->id)>

                            {{ $item->nama }}

                        </option>

                        @endforeach

                    </select>

                </div>

                <div>

                    <label class="block mb-2 font-semibold">

                        NIM

                    </label>

                    <input
                        type="text"
                        name="nim"
                        value="{{ old('nim',$mahasiswa->nim) }}"
                        class="w-full border rounded-lg px-4 py-3">

                </div>

                <div>

                    <label class="block mb-2 font-semibold">

                        Nama Lengkap

                    </label>

                    <input
                        type="text"
                        name="nama"
                        value="{{ old('nama',$mahasiswa->nama) }}"
                        class="w-full border rounded-lg px-4 py-3">

                </div>

                <div>

                    <label class="block mb-2 font-semibold">

                        Jenis Kelamin

                    </label>

                    <select
                        name="jenis_kelamin"
                        class="w-full border rounded-lg px-4 py-3">

                        <option value="L" @selected($mahasiswa->jenis_kelamin=='L')>

                            Laki-laki

                        </option>

                        <option value="P" @selected($mahasiswa->jenis_kelamin=='P')>

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
                        value="{{ old('tempat_lahir',$mahasiswa->tempat_lahir) }}"
                        class="w-full border rounded-lg px-4 py-3">

                </div>

                <div>

                    <label class="block mb-2 font-semibold">

                        Tanggal Lahir

                    </label>

                    <input
                        type="date"
                        name="tanggal_lahir"
                        value="{{ old('tanggal_lahir',$mahasiswa->tanggal_lahir) }}"
                        class="w-full border rounded-lg px-4 py-3">

                </div>
                                <div class="col-span-2">

                    <label class="block mb-2 font-semibold">

                        Alamat

                    </label>

                    <textarea
                        name="alamat"
                        rows="3"
                        class="w-full border rounded-lg px-4 py-3">{{ old('alamat',$mahasiswa->alamat) }}</textarea>

                </div>

                <div>

                    <label class="block mb-2 font-semibold">

                        Email

                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email',$mahasiswa->email) }}"
                        class="w-full border rounded-lg px-4 py-3">

                </div>

                <div>

                    <label class="block mb-2 font-semibold">

                        No. HP

                    </label>

                    <input
                        type="text"
                        name="no_hp"
                        value="{{ old('no_hp',$mahasiswa->no_hp) }}"
                        class="w-full border rounded-lg px-4 py-3">

                </div>

                <div>

                    <label class="block mb-2 font-semibold">

                        Angkatan

                    </label>

                    <input
                        type="number"
                        name="angkatan"
                        value="{{ old('angkatan',$mahasiswa->angkatan) }}"
                        class="w-full border rounded-lg px-4 py-3">

                </div>

                <div>

                    <label class="block mb-2 font-semibold">

                        Semester

                    </label>

                    <select
                        name="semester"
                        class="w-full border rounded-lg px-4 py-3">

                        @for($i=1;$i<=14;$i++)

                        <option
                            value="{{ $i }}"
                            @selected($mahasiswa->semester==$i)>

                            Semester {{ $i }}

                        </option>

                        @endfor

                    </select>

                </div>

                <div>

                    <label class="block mb-2 font-semibold">

                        Status

                    </label>

                    <select
                        name="status"
                        class="w-full border rounded-lg px-4 py-3">

                        <option value="Aktif" @selected($mahasiswa->status=='Aktif')>Aktif</option>

                        <option value="Cuti" @selected($mahasiswa->status=='Cuti')>Cuti</option>

                        <option value="Lulus" @selected($mahasiswa->status=='Lulus')>Lulus</option>

                        <option value="DO" @selected($mahasiswa->status=='DO')>DO</option>

                    </select>

                </div>

                <div class="col-span-2 flex justify-end gap-3 pt-6 border-t">

                    <a
                        href="{{ route('admin.mahasiswa.index') }}"
                        class="px-6 py-3 bg-gray-300 rounded-lg">

                        Batal

                    </a>

                    <button
                        type="submit"
                        class="px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg">

                        Update Mahasiswa

                    </button>

                </div>

            </div>

        </form>

    </div>

</div>

@endsection