<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\Fakultas;
use App\Models\ProgramStudi;
use App\Models\MataKuliah;
use App\Models\Jadwal;
use App\Models\TahunAkademik;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [

            'totalUsers' => User::count(),

            'totalDosen' => Dosen::count(),

            'totalMahasiswa' => Mahasiswa::count(),

            'totalMatkul' => MataKuliah::count(),

            'totalFakultas' => Fakultas::count(),

            'totalProdi' => ProgramStudi::count(),

            'totalJadwal' => Jadwal::count(),

            'totalTahunAkademik' => TahunAkademik::count()

        ]);
    }
}