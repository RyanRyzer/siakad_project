@extends('layouts.app')

@section('content')

<div class="flex justify-between items-center mb-8">

    <div>

        <h1 class="text-3xl font-bold">

            Transkrip Nilai

        </h1>

        <p class="text-gray-500">

            Seluruh riwayat nilai mahasiswa.

        </p>

    </div>

</div>

@php

$totalSks = 0;

$totalBobot = 0;

@endphp

<div class="bg-white rounded-xl shadow overflow-hidden">

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

                    SKS

                </th>

                <th class="p-4">

                    Nilai Angka

                </th>

                <th class="p-4">

                    Huruf

                </th>

                <th class="p-4">

                    Bobot

                </th>

            </tr>

        </thead>

        <tbody>

            @forelse($nilai as $item)

            @php

                $sks = $item->jadwal->mataKuliah->sks;

                switch($item->nilai_huruf){

                    case 'A':

                        $bobot=4;

                        break;

                    case 'AB':

                        $bobot=3.5;

                        break;

                    case 'B':

                        $bobot=3;

                        break;

                    case 'BC':

                        $bobot=2.5;

                        break;

                    case 'C':

                        $bobot=2;

                        break;

                    case 'D':

                        $bobot=1;

                        break;

                    default:

                        $bobot=0;

                }

                $totalSks += $sks;

                $totalBobot += ($bobot*$sks);

            @endphp

            <tr class="border-b">

                <td class="p-4">

                    {{ $item->jadwal->mataKuliah->kode_mk }}

                </td>

                <td class="p-4">

                    {{ $item->jadwal->mataKuliah->nama_mk }}

                </td>

                <td class="text-center">

                    {{ $sks }}

                </td>

                <td class="text-center">

                    {{ $item->nilai_angka }}

                </td>

                <td class="text-center font-bold">

                    {{ $item->nilai_huruf }}

                </td>

                <td class="text-center">

                    {{ number_format($bobot,1) }}

                </td>

            </tr>

            @empty

            <tr>

                <td colspan="6" class="text-center py-10">

                    Belum ada data nilai.

                </td>

            </tr>

            @endforelse

        </tbody>

        @if($nilai->count())

        <tfoot>

            <tr class="bg-slate-100 font-bold">

                <td colspan="2" class="p-4">

                    Total

                </td>

                <td class="text-center">

                    {{ $totalSks }}

                </td>

                <td colspan="2" class="text-center">

                    IPK

                </td>

                <td class="text-center">

                    {{ $totalSks ? number_format($totalBobot/$totalSks,2) : '0.00' }}

                </td>

            </tr>

        </tfoot>

        @endif

    </table>

</div>

@endsection