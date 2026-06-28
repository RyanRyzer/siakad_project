<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\DetailKrs;
use App\Models\Jadwal;
use App\Models\Krs;
use App\Models\Mahasiswa;
use App\Models\TahunAkademik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KrsController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::where(
            'user_id',
            Auth::id()
        )->first();

        $krs = Krs::with([
            'tahunAkademik',
            'detailKrs.jadwal.mataKuliah'
        ])

        ->where(
            'mahasiswa_id',
            $mahasiswa->id
        )

        ->latest()

        ->get();

        return view(
            'mahasiswa.krs.index',
            compact(
                'krs'
            )
        );
    }

    public function create()
    {
        $mahasiswa = Mahasiswa::where(
            'user_id',
            Auth::id()
        )->first();

        $tahunAkademik = TahunAkademik::where(
            'status',
            'Aktif'
        )->first();

        $jadwal = Jadwal::with([
            'mataKuliah',
            'dosen'
        ])->get();

        return view(
            'mahasiswa.krs.create',
            compact(
                'mahasiswa',
                'tahunAkademik',
                'jadwal'
            )
        );
    }
        public function store(Request $request)
    {
        $request->validate([

            'jadwal_id' => 'required|array|min:1',

            'jadwal_id.*' => 'exists:jadwal,id'

        ]);

        $mahasiswa = Mahasiswa::where(
            'user_id',
            Auth::id()
        )->first();

        $tahunAkademik = TahunAkademik::where(
            'status',
            'Aktif'
        )->first();

        if (!$tahunAkademik) {

            return back()->with(
                'error',
                'Tidak ada Tahun Akademik yang aktif.'
            );

        }

        $krs = Krs::create([

            'mahasiswa_id' => $mahasiswa->id,

            'tahun_akademik_id' => $tahunAkademik->id,

            'tanggal_pengisian' => now(),

            'status' => 'Draft'

        ]);

        foreach ($request->jadwal_id as $jadwal) {

            DetailKrs::create([

                'krs_id' => $krs->id,

                'jadwal_id' => $jadwal

            ]);

        }

        return redirect()

            ->route('mahasiswa.krs.index')

            ->with(
                'success',
                'KRS berhasil dibuat.'
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
            'mahasiswa.krs.show',
            [
                'krs' => $kr
            ]
        );
    }

    public function destroy(Krs $kr)
    {
        if ($kr->status != 'Draft') {

            return back()->with(
                'error',
                'KRS yang sudah disetujui tidak dapat dihapus.'
            );

        }

        $kr->detailKrs()->delete();

        $kr->delete();

        return redirect()

            ->route('mahasiswa.krs.index')

            ->with(
                'success',
                'KRS berhasil dihapus.'
            );
    }
}