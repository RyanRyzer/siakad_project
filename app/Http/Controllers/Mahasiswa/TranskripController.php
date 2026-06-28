<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\Nilai;
use Illuminate\Support\Facades\Auth;

class TranskripController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::where(

            'user_id',

            Auth::id()

        )->firstOrFail();

        $nilai = Nilai::with([

            'jadwal.mataKuliah'

        ])

        ->where(

            'mahasiswa_id',

            $mahasiswa->id

        )

        ->orderBy('id')

        ->get();

        return view(

            'mahasiswa.transkrip.index',

            compact(

                'nilai'

            )

        );
    }
}