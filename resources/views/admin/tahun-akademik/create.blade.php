@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto">

    <div class="flex justify-between items-center mb-8">

        <div>

            <h1 class="text-3xl font-bold text-slate-800">

                Tambah Tahun Akademik

            </h1>

            <p class="text-gray-500">

                Tambahkan Tahun Akademik baru.

            </p>

        </div>

        <a
            href="{{ route('admin.tahun-akademik.index') }}"
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
            action="{{ route('admin.tahun-akademik.store') }}"
            method="POST">

            @csrf

            <div class="p-8 space-y-6">

                <div>

                    <label class="block mb-2 font-semibold">

                        Tahun Akademik

                    </label>

                    <input
                        type="text"
                        name="tahun"
                        placeholder="2025/2026"
                        value="{{ old('tahun') }}"
                        class="w-full border rounded-lg px-4 py-3"
                        required>

                </div>

                <div>

                    <label class="block mb-2 font-semibold">

                        Semester

                    </label>

                    <select
                        name="semester"
                        class="w-full border rounded-lg px-4 py-3">

                        <option value="Ganjil">

                            Ganjil

                        </option>

                        <option value="Genap">

                            Genap

                        </option>

                    </select>

                </div>

                <div>

                    <label class="block mb-2 font-semibold">

                        Status

                    </label>

                    <select
                        name="status"
                        class="w-full border rounded-lg px-4 py-3">

                        <option value="Aktif">

                            Aktif

                        </option>

                        <option value="Tidak Aktif">

                            Tidak Aktif

                        </option>

                    </select>

                </div>

                <div class="flex justify-end gap-3 pt-6 border-t">

                    <a
                        href="{{ route('admin.tahun-akademik.index') }}"
                        class="px-6 py-3 rounded-lg bg-gray-300 hover:bg-gray-400">

                        Batal

                    </a>

                    <button
                        type="submit"
                        class="px-6 py-3 rounded-lg bg-indigo-600 hover:bg-indigo-700 text-white">

                        Simpan

                    </button>

                </div>

            </div>

        </form>

    </div>

</div>

@endsection