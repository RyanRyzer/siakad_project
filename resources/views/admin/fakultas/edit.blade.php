@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto">

    <div class="flex justify-between items-center mb-8">

        <div>

            <h1 class="text-3xl font-bold text-slate-800">

                Edit Fakultas

            </h1>

            <p class="text-gray-500 mt-1">

                Perbarui data fakultas.

            </p>

        </div>

        <a
            href="{{ route('admin.fakultas.index') }}"
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
            action="{{ route('admin.fakultas.update',$fakultas) }}"
            method="POST">

            @csrf
            @method('PUT')

            <div class="p-8 space-y-6">

                <div>

                    <label class="block mb-2 font-semibold">

                        Kode Fakultas

                    </label>

                    <input
                        type="text"
                        name="kode_fakultas"
                        value="{{ old('kode_fakultas',$fakultas->kode_fakultas) }}"
                        class="w-full border rounded-lg px-4 py-3"
                        required>

                </div>

                <div>

                    <label class="block mb-2 font-semibold">

                        Nama Fakultas

                    </label>

                    <input
                        type="text"
                        name="nama_fakultas"
                        value="{{ old('nama_fakultas',$fakultas->nama_fakultas) }}"
                        class="w-full border rounded-lg px-4 py-3"
                        required>

                </div>
                                <div class="flex justify-end gap-3 pt-6 border-t">

                    <a
                        href="{{ route('admin.fakultas.index') }}"
                        class="px-6 py-3 rounded-lg bg-gray-300 hover:bg-gray-400 text-gray-800">

                        Batal

                    </a>

                    <button
                        type="submit"
                        class="px-6 py-3 rounded-lg bg-indigo-600 hover:bg-indigo-700 text-white">

                        Update Fakultas

                    </button>

                </div>

            </div>

        </form>

    </div>

</div>

@endsection