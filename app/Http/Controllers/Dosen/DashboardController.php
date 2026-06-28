<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\Jadwal;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $dosen = Dosen::where(
            'user_id',
            Auth::id()
        )->first();

        return view('dosen.dashboard',[

            'dosen'=>$dosen,

            'totalJadwal'=>Jadwal::where(
                'dosen_id',
                $dosen->id
            )->count()

        ]);
    }
}