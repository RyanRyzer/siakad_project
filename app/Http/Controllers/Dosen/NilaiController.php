<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\Nilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NilaiController extends Controller
{
    public function index()
    {
        $dosen = \App\Models\Dosen::where(
            'user_id',
            Auth::id()
        )->first();

        $jadwal = Jadwal::with([
            'mataKuliah'
        ])

        ->where(
            'dosen_id',
            $dosen->id
        )

        ->get();

        return view(
            'dosen.nilai.index',
            compact('jadwal')
        );
    }

    public function mahasiswa(Jadwal $jadwal)
    {
        $jadwal->load([
            'mataKuliah'
        ]);

        $detail = \App\Models\DetailKrs::with([
            'krs.mahasiswa'
        ])

        ->where(
            'jadwal_id',
            $jadwal->id
        )

        ->get();

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
        $nilai = Nilai::firstOrNew([

            'jadwal_id'=>$jadwal,

            'mahasiswa_id'=>$mahasiswa

        ]);

        return view(
            'dosen.nilai.edit',
            compact('nilai')
        );
    }

    public function update(Request $request,$jadwal,$mahasiswa)
    {
        $request->validate([

            'nilai_angka'=>'required|numeric|min:0|max:100'

        ]);

        $angka = $request->nilai_angka;

        if($angka>=85){

            $huruf='A';

        }elseif($angka>=80){

            $huruf='AB';

        }elseif($angka>=75){

            $huruf='B';

        }elseif($angka>=70){

            $huruf='BC';

        }elseif($angka>=65){

            $huruf='C';

        }elseif($angka>=50){

            $huruf='D';

        }else{

            $huruf='E';

        }

        Nilai::updateOrCreate(

            [

                'jadwal_id'=>$jadwal,

                'mahasiswa_id'=>$mahasiswa

            ],

            [

                'nilai_angka'=>$angka,

                'nilai_huruf'=>$huruf

            ]

        );

        return redirect()

            ->route(
                'dosen.nilai.mahasiswa',
                $jadwal
            )

            ->with(
                'success',
                'Nilai berhasil disimpan.'
            );
    }
}