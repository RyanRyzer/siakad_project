@extends('layouts.app')

@section('content')

<div class="max-w-6xl mx-auto">

    <div class="bg-white rounded-xl shadow">

        <div class="p-8 border-b">

            <h1 class="text-3xl font-bold">

                Detail KRS

            </h1>

            <p class="text-gray-500 mt-2">

                {{ $krs->tahunAkademik->tahun }}

                -

                {{ $krs->tahunAkademik->semester }}

            </p>

        </div>

        <div class="p-8">

            <table class="w-full">

                <thead>

                    <tr class="bg-slate-100">

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

                    @php

                        $totalSks=0;

                    @endphp

                    @foreach($krs->detailKrs as $detail)

                    @php

                        $totalSks += $detail->jadwal->mataKuliah->sks;

                    @endphp

                    <tr class="border-b">

                        <td class="p-4">

                            {{ $detail->jadwal->mataKuliah->kode_mk }}

                        </td>

                        <td class="p-4">

                            {{ $detail->jadwal->mataKuliah->nama_mk }}

                        </td>

                        <td class="p-4">

                            {{ $detail->jadwal->dosen->nama }}

                        </td>

                        <td class="p-4">

                            {{ $detail->jadwal->hari }}

                        </td>

                        <td class="p-4">

                            {{ substr($detail->jadwal->jam_mulai,0,5) }}

                            -

                            {{ substr($detail->jadwal->jam_selesai,0,5) }}

                        </td>

                        <td class="text-center">

                            {{ $detail->jadwal->mataKuliah->sks }}

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

            <div class="mt-8 flex justify-between">

                <div>

                    <span class="font-semibold">

                        Status :

                    </span>

                    {{ $krs->status }}

                </div>

                <div class="font-bold text-xl">

                    Total SKS :

                    {{ $totalSks }}

                </div>

            </div>

        </div>

    </div>

</div>

@endsection