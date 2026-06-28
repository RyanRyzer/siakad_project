@extends('layouts.app')

@section('content')

<div class="flex justify-between items-center mb-6">

    <div>

        <h1 class="text-3xl font-bold">

            Tahun Akademik

        </h1>

        <p class="text-gray-500">

            Kelola Tahun Akademik.

        </p>

    </div>

    <a
        href="{{ route('admin.tahun-akademik.create') }}"
        class="bg-indigo-600 text-white px-5 py-3 rounded-lg">

        + Tambah Tahun Akademik

    </a>

</div>

@if(session('success'))

<div class="bg-green-100 text-green-700 border border-green-300 rounded-lg p-4 mb-6">

    {{ session('success') }}

</div>

@endif

<div class="bg-white rounded-xl shadow overflow-hidden">

    <table class="w-full">

        <thead>

            <tr class="bg-slate-100">

                <th class="px-6 py-4">Tahun</th>

                <th class="px-6 py-4">Semester</th>

                <th class="px-6 py-4">Status</th>

                <th class="px-6 py-4 text-center">Aksi</th>

            </tr>

        </thead>

        <tbody>

            @foreach($tahunAkademik as $item)

            <tr class="border-b">

                <td class="px-6 py-4">

                    {{ $item->tahun }}

                </td>

                <td class="px-6 py-4">

                    {{ $item->semester }}

                </td>

                <td class="px-6 py-4">

                    @if($item->status=="Aktif")

                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full">

                            Aktif

                        </span>

                    @else

                        <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full">

                            Tidak Aktif

                        </span>

                    @endif

                </td>

                <td class="px-6 py-4 text-center">

                    ...

                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

</div>

@endsection