<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\DetailKrs;
use App\Models\Dosen;
use App\Models\Jadwal;
use App\Models\Nilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NilaiController extends Controller
{
    public function index()
    {
        $dosen = Dosen::where(
            'user_id',
            Auth::id()
        )->firstOrFail();

        $jadwal = Jadwal::with([
            'mataKuliah',
            'tahunAkademik'
        ])

        ->where(
            'dosen_id',
            $dosen->id
        )

        ->orderBy('hari')

        ->orderBy('jam_mulai')

        ->get();

        return view(
            'dosen.nilai.index',
            compact(
                'jadwal'
            )
        );
    }

    public function mahasiswa(Jadwal $jadwal)
    {
        $jadwal->load([
            'mataKuliah',
            'tahunAkademik'
        ]);

        $detail = DetailKrs::with([
            'krs.mahasiswa'
        ])

        ->where(
            'jadwal_id',
            $jadwal->id
        )

        ->get();

        foreach ($detail as $item) {

            $item->nilai = Nilai::where(

                'jadwal_id',
                $jadwal->id

            )

            ->where(

                'mahasiswa_id',
                $item->krs->mahasiswa->id

            )

            ->first();

        }

        return view(

            'dosen.nilai.mahasiswa',

            compact(

                'jadwal',

                'detail'

            )

        );
    }

    public function edit($jadwal,$mahasiswa)
    {
        $jadwalData = Jadwal::with(
            'mataKuliah'
        )->findOrFail(
            $jadwal
        );

        $nilai = Nilai::firstOrNew([

            'jadwal_id'=>$jadwal,

            'mahasiswa_id'=>$mahasiswa

        ]);
                $mahasiswaData = \App\Models\Mahasiswa::findOrFail(
            $mahasiswa
        );

        return view(
            'dosen.nilai.edit',
            compact(
                'nilai',
                'jadwalData',
                'mahasiswaData'
            )
        );
    }

    public function update(
        Request $request,
        $jadwal,
        $mahasiswa
    )
    {
        $request->validate([

            'nilai_angka' => 'required|numeric|min:0|max:100'

        ]);

        $angka = (float) $request->nilai_angka;

        if ($angka >= 86) {

            $huruf = 'A';

        } elseif ($angka >= 76) {

            $huruf = 'B';

        } elseif ($angka >= 55) {

            $huruf = 'C';

        } elseif ($angka > 0) {

            $huruf = 'D';

        } else {

            $huruf = 'E';

        }

        $nilai = Nilai::updateOrCreate(

            [

                'jadwal_id' => $jadwal,

                'mahasiswa_id' => $mahasiswa

            ],

            [

                'nilai_angka' => $angka,

                'nilai_huruf' => $huruf

            ]

        );

        return redirect()

            ->route(

                'dosen.nilai.mahasiswa',

                $jadwal

            )

            ->with(

                'success',

                'Nilai mahasiswa berhasil disimpan.'

            );
    }
}