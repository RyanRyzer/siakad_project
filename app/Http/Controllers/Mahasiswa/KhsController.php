<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\Nilai;
use Illuminate\Support\Facades\Auth;

class KhsController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::where(
            'user_id',
            Auth::id()
        )->firstOrFail();

        $nilai = Nilai::with([
            'jadwal.mataKuliah',
            'jadwal.tahunAkademik'
        ])
        ->where(
            'mahasiswa_id',
            $mahasiswa->id
        )
        ->get();

        $totalSks = 0;

        $totalBobot = 0;

        foreach ($nilai as $item) {

            $sks = $item->jadwal->mataKuliah->sks;

            $totalSks += $sks;

            switch ($item->nilai_huruf) {

                case 'A':
                    $bobot = 4;
                    break;

                case 'AB':
                    $bobot = 3.5;
                    break;

                case 'B':
                    $bobot = 3;
                    break;

                case 'BC':
                    $bobot = 2.5;
                    break;

                case 'C':
                    $bobot = 2;
                    break;

                case 'D':
                    $bobot = 1;
                    break;

                default:
                    $bobot = 0;

            }

            $totalBobot += ($bobot * $sks);

        }

        $ip = $totalSks > 0

            ? round($totalBobot / $totalSks,2)

            : 0;

        return view(

            'mahasiswa.khs.index',

            compact(

                'nilai',

                'ip',

                'totalSks'

            )

        );
    }
}