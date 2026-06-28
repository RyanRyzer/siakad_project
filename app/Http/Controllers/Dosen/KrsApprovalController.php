<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\Krs;
use Illuminate\Http\Request;

class KrsApprovalController extends Controller
{
    public function index()
    {
        $krs = Krs::with([
            'mahasiswa',
            'tahunAkademik'
        ])
        ->latest()
        ->paginate(10);

        return view(
            'dosen.krs.index',
            compact('krs')
        );
    }

    public function show(Krs $kr)
    {
        $kr->load([
            'mahasiswa',
            'tahunAkademik',
            'detailKrs.jadwal.mataKuliah',
            'detailKrs.jadwal.dosen'
        ]);

        return view(
            'dosen.krs.show',
            [
                'krs'=>$kr
            ]
        );
    }

    public function approve(Krs $kr)
    {
        $kr->update([

            'status'=>'Disetujui'

        ]);

        return back()->with(
            'success',
            'KRS berhasil disetujui.'
        );
    }

    public function reject(Krs $kr)
    {
        $kr->update([

            'status'=>'Ditolak'

        ]);

        return back()->with(
            'success',
            'KRS berhasil ditolak.'
        );
    }
}