@extends('layouts.app')

@section('content')

<div class="max-w-4xl mx-auto">

    <div class="flex justify-between items-center mb-8">

        <div>

            <h1 class="text-3xl font-bold text-slate-800">

                Edit Mata Kuliah

            </h1>

            <p class="text-gray-500">

                Perbarui data mata kuliah.

            </p>

        </div>

        <a
            href="{{ route('admin.mata-kuliah.index') }}"
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
            action="{{ route('admin.mata-kuliah.update',$mataKuliah) }}"
            method="POST">

            @csrf
            @method('PUT')

            <div class="p-8 grid grid-cols-2 gap-6">

                <div>

                    <label class="block mb-2 font-semibold">

                        Program Studi

                    </label>

                    <select
                        name="program_studi_id"
                        class="w-full border rounded-lg px-4 py-3"
                        required>

                        @foreach($programStudi as $item)

                        <option
                            value="{{ $item->id }}"
                            @selected($mataKuliah->program_studi_id==$item->id)>

                            {{ $item->nama_prodi }}

                        </option>

                        @endforeach

                    </select>

                </div>

                <div>

                    <label class="block mb-2 font-semibold">

                        Kode Mata Kuliah

                    </label>

                    <input
                        type="text"
                        name="kode_mk"
                        value="{{ old('kode_mk',$mataKuliah->kode_mk) }}"
                        class="w-full border rounded-lg px-4 py-3"
                        required>

                </div>

                <div>

                    <label class="block mb-2 font-semibold">

                        Nama Mata Kuliah

                    </label>

                    <input
                        type="text"
                        name="nama_mk"
                        value="{{ old('nama_mk',$mataKuliah->nama_mk) }}"
                        class="w-full border rounded-lg px-4 py-3"
                        required>

                </div>

                <div>

                    <label class="block mb-2 font-semibold">

                        Semester

                    </label>

                    <select
                        name="semester"
                        class="w-full border rounded-lg px-4 py-3"
                        required>

                        @for($i=1;$i<=14;$i++)

                        <option
                            value="{{ $i }}"
                            @selected($mataKuliah->semester==$i)>

                            Semester {{ $i }}

                        </option>

                        @endfor

                    </select>

                </div>

                <div>

                    <label class="block mb-2 font-semibold">

                        SKS

                    </label>

                    <select
                        name="sks"
                        class="w-full border rounded-lg px-4 py-3"
                        required>

                        @for($i=1;$i<=6;$i++)

                        <option
                            value="{{ $i }}"
                            @selected($mataKuliah->sks==$i)>

                            {{ $i }} SKS

                        </option>

                        @endfor

                    </select>

                </div>

                <div class="col-span-2 flex justify-end gap-3 pt-6 border-t">

                    <a
                        href="{{ route('admin.mata-kuliah.index') }}"
                        class="px-6 py-3 bg-gray-300 hover:bg-gray-400 rounded-lg">

                        Batal

                    </a>

                    <button
                        type="submit"
                        class="px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg">

                        Update Mata Kuliah

                    </button>

                </div>

            </div>

        </form>

    </div>

</div>

@endsection