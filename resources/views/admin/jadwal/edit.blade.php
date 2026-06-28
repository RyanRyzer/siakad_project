@extends('layouts.app')

@section('content')

<div class="max-w-5xl mx-auto">

    <div class="flex justify-between items-center mb-8">

        <div>

            <h1 class="text-3xl font-bold text-slate-800">

                Edit Jadwal Perkuliahan

            </h1>

            <p class="text-gray-500">

                Perbarui data jadwal perkuliahan.

            </p>

        </div>

        <a
            href="{{ route('admin.jadwal.index') }}"
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
            action="{{ route('admin.jadwal.update',$jadwal) }}"
            method="POST">

            @csrf
            @method('PUT')

            <div class="grid grid-cols-2 gap-6 p-8">

                <div>

                    <label class="block mb-2 font-semibold">

                        Mata Kuliah

                    </label>

                    <select
                        name="mata_kuliah_id"
                        class="w-full border rounded-lg px-4 py-3"
                        required>

                        @foreach($mataKuliah as $item)

                            <option
                                value="{{ $item->id }}"
                                @selected($jadwal->mata_kuliah_id == $item->id)>

                                {{ $item->kode_mk }} - {{ $item->nama_mk }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div>

                    <label class="block mb-2 font-semibold">

                        Dosen

                    </label>

                    <select
                        name="dosen_id"
                        class="w-full border rounded-lg px-4 py-3"
                        required>

                        @foreach($dosen as $item)

                            <option
                                value="{{ $item->id }}"
                                @selected($jadwal->dosen_id == $item->id)>

                                {{ $item->nama }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div>

                    <label class="block mb-2 font-semibold">

                        Tahun Akademik

                    </label>

                    <select
                        name="tahun_akademik_id"
                        class="w-full border rounded-lg px-4 py-3"
                        required>

                        @foreach($tahunAkademik as $item)

                            <option
                                value="{{ $item->id }}"
                                @selected($jadwal->tahun_akademik_id == $item->id)>

                                {{ $item->tahun }} - {{ $item->semester }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div>

                    <label class="block mb-2 font-semibold">

                        Hari

                    </label>

                    <select
                        name="hari"
                        class="w-full border rounded-lg px-4 py-3"
                        required>

                        @foreach(['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'] as $hari)

                            <option
                                value="{{ $hari }}"
                                @selected($jadwal->hari == $hari)>

                                {{ $hari }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div>

                    <label class="block mb-2 font-semibold">

                        Jam Mulai

                    </label>

                    <input
                        type="time"
                        name="jam_mulai"
                        value="{{ old('jam_mulai',$jadwal->jam_mulai) }}"
                        class="w-full border rounded-lg px-4 py-3"
                        required>

                </div>

                <div>

                    <label class="block mb-2 font-semibold">

                        Jam Selesai

                    </label>

                    <input
                        type="time"
                        name="jam_selesai"
                        value="{{ old('jam_selesai',$jadwal->jam_selesai) }}"
                        class="w-full border rounded-lg px-4 py-3"
                        required>

                </div>

                <div class="col-span-2 flex justify-end gap-3 pt-6 border-t">

                    <a
                        href="{{ route('admin.jadwal.index') }}"
                        class="px-6 py-3 bg-gray-300 hover:bg-gray-400 rounded-lg">

                        Batal

                    </a>

                    <button
                        type="submit"
                        class="px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg">

                        Update Jadwal

                    </button>

                </div>

            </div>

        </form>

    </div>

</div>

@endsection