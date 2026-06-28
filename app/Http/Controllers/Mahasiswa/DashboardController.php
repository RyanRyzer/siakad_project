<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Krs;
use App\Models\Mahasiswa;
use App\Models\Nilai;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::where(
            'user_id',
            Auth::id()
        )->first();

        return view('mahasiswa.dashboard', [

            'mahasiswa' => $mahasiswa,

            'totalKrs' => Krs::where(
                'mahasiswa_id',
                $mahasiswa->id
            )->count(),

            'totalNilai' => Nilai::where(
                'mahasiswa_id',
                $mahasiswa->id
            )->count(),

            'semester' => $mahasiswa->semester,

            'status' => $mahasiswa->status

        ]);
    }
}