@extends('layouts.app')

@section('content')

<div class="max-w-4xl mx-auto">

    <div class="bg-white rounded-xl shadow">

        <form action="{{ route('admin.mata-kuliah.store') }}" method="POST">

            @csrf

            <div class="p-8 grid grid-cols-2 gap-6">

                <div>

                    <label>Program Studi</label>

                    <select
                        name="program_studi_id"
                        class="w-full border rounded-lg px-4 py-3">

                        @foreach($programStudi as $item)

                        <option value="{{ $item->id }}">

                            {{ $item->nama_prodi }}

                        </option>

                        @endforeach

                    </select>

                </div>

                <div>

                    <label>Kode MK</label>

                    <input
                        type="text"
                        name="kode_mk"
                        class="w-full border rounded-lg px-4 py-3">

                </div>

                <div>

                    <label>Nama Mata Kuliah</label>

                    <input
                        type="text"
                        name="nama_mk"
                        class="w-full border rounded-lg px-4 py-3">

                </div>

                <div>

                    <label>Semester</label>

                    <select
                        name="semester"
                        class="w-full border rounded-lg px-4 py-3">

                        @for($i=1;$i<=14;$i++)

                        <option value="{{ $i }}">

                            Semester {{ $i }}

                        </option>

                        @endfor

                    </select>

                </div>

                <div>

                    <label>SKS</label>

                    <select
                        name="sks"
                        class="w-full border rounded-lg px-4 py-3">

                        @for($i=1;$i<=6;$i++)

                        <option value="{{ $i }}">

                            {{ $i }}

                        </option>

                        @endfor

                    </select>

                </div>

                <div class="col-span-2 flex justify-end gap-3">

                    <a
                        href="{{ route('admin.mata-kuliah.index') }}"
                        class="px-6 py-3 bg-gray-300 rounded-lg">

                        Batal

                    </a>

                    <button
                        class="px-6 py-3 bg-indigo-600 text-white rounded-lg">

                        Simpan

                    </button>

                </div>

            </div>

        </form>

    </div>

</div>

@endsection