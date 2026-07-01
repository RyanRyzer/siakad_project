@extends('layouts.app')

@section('content')

<div class="max-w-2xl mx-auto">

    <div class="bg-white rounded-xl shadow">

        <div class="border-b px-8 py-6">

            <h1 class="text-3xl font-bold">

                {{ $nilai->exists ? 'Edit Nilai' : 'Input Nilai' }}

            </h1>

            <p class="text-gray-500 mt-2">

                {{ $jadwalData->mataKuliah->nama_mk }}

            </p>

            <p class="text-gray-500">

                {{ $mahasiswaData->nim }}

                -

                {{ $mahasiswaData->nama }}

            </p>

        </div>

        <form

            action="{{ route('dosen.nilai.update',[$jadwalData->id,$mahasiswaData->id]) }}"

            method="POST">

            @csrf

            @method('PUT')

            <div class="p-8">

                <div>

                    <label class="block font-semibold mb-2">

                        Nilai Angka

                    </label>

                    <input

                        type="number"

                        name="nilai_angka"

                        min="0"

                        max="100"

                        step="0.01"

                        value="{{ old('nilai_angka',$nilai->nilai_angka) }}"

                        class="w-full border rounded-lg px-4 py-3"

                        required>

                    @error('nilai_angka')

                    <p class="text-red-500 mt-2">

                        {{ $message }}

                    </p>

                    @enderror

                </div>
                                <div class="mt-8 bg-slate-50 rounded-lg p-5">

                    @php

                        $huruf = '-';

                        $angka = old('nilai_angka', $nilai->nilai_angka);

                        if($angka !== null){

                            if($angka >= 85){

                                $huruf='A';

                            }elseif($angka >= 80){

                                $huruf='AB';

                            }elseif($angka >= 75){

                                $huruf='B';

                            }elseif($angka >= 70){

                                $huruf='BC';

                            }elseif($angka >= 65){

                                $huruf='C';

                            }elseif($angka >= 50){

                                $huruf='D';

                            }else{

                                $huruf='E';

                            }

                        }

                    @endphp

                    <div class="flex justify-between">

                        <span class="font-semibold">

                            Prediksi Nilai Huruf

                        </span>

                        <span class="text-indigo-600 font-bold text-xl">

                            {{ $huruf }}

                        </span>

                    </div>

                </div>

                <div class="mt-8 flex justify-end gap-3">

                    <a

                        href="{{ route('dosen.nilai.mahasiswa',$jadwalData->id) }}"

                        class="bg-gray-300 hover:bg-gray-400 px-6 py-3 rounded-lg">

                        Kembali

                    </a>

                    <button

                        type="submit"

                        class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-lg">

                        {{ $nilai->exists ? 'Update Nilai' : 'Simpan Nilai' }}

                    </button>

                </div>

            </div>

        </form>

    </div>

</div>

@endsection