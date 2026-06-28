@extends('layouts.app')

@section('content')

<div class="max-w-6xl mx-auto">

    <div class="flex justify-between items-center mb-8">

        <div>

            <h1 class="text-3xl font-bold text-slate-800">

                Isi Kartu Rencana Studi

            </h1>

            <p class="text-gray-500">

                Pilih mata kuliah yang akan diambil.

            </p>

        </div>

        <a
            href="{{ route('mahasiswa.krs.index') }}"
            class="bg-slate-600 hover:bg-slate-700 text-white px-5 py-3 rounded-lg">

            Kembali

        </a>

    </div>

    @if(session('error'))

        <div class="bg-red-100 border border-red-300 text-red-700 rounded-lg p-4 mb-6">

            {{ session('error') }}

        </div>

    @endif

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

        <form action="{{ route('mahasiswa.krs.store') }}" method="POST">

            @csrf

            <div class="p-8">

                <div class="grid grid-cols-2 gap-6 mb-8">

                    <div>

                        <label class="block mb-2 font-semibold">

                            Mahasiswa

                        </label>

                        <input
                            type="text"
                            value="{{ $mahasiswa->nama }}"
                            class="w-full border rounded-lg px-4 py-3 bg-gray-100"
                            readonly>

                    </div>

                    <div>

                        <label class="block mb-2 font-semibold">

                            Tahun Akademik

                        </label>

                        <input
                            type="text"
                            value="{{ $tahunAkademik->tahun }} - {{ $tahunAkademik->semester }}"
                            class="w-full border rounded-lg px-4 py-3 bg-gray-100"
                            readonly>

                    </div>

                </div>

                <table class="w-full border">

                    <thead>

                        <tr class="bg-slate-100">

                            <th class="p-4">

                                Pilih

                            </th>

                            <th class="p-4">

                                Kode

                            </th>

                            <th class="p-4">

                                Mata Kuliah

                            </th>

                            <th class="p-4">

                                Dosen

                            </th>

                            <th class="p-4">

                                Hari

                            </th>

                            <th class="p-4">

                                Jam

                            </th>

                            <th class="p-4">

                                SKS

                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach($jadwal as $item)

                        <tr class="border-b">

                            <td class="text-center">

                                <input
                                    type="checkbox"
                                    name="jadwal_id[]"
                                    value="{{ $item->id }}">

                            </td>

                            <td class="p-4">

                                {{ $item->mataKuliah->kode_mk }}

                            </td>

                            <td class="p-4">

                                {{ $item->mataKuliah->nama_mk }}

                            </td>

                            <td class="p-4">

                                {{ $item->dosen->nama }}

                            </td>

                            <td class="p-4">

                                {{ $item->hari }}

                            </td>

                            <td class="p-4">

                                {{ substr($item->jam_mulai,0,5) }}

                                -

                                {{ substr($item->jam_selesai,0,5) }}

                            </td>

                            <td class="text-center">

                                {{ $item->mataKuliah->sks }}

                            </td>

                        </tr>

                        @endforeach

                    </tbody>

                </table>

                <div class="flex justify-end mt-8">

                    <button
                        type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-3 rounded-lg">

                        Simpan KRS

                    </button>

                </div>

            </div>

        </form>

    </div>

</div>

@endsection