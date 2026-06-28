<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\MataKuliah;
use App\Models\Dosen;
use App\Models\TahunAkademik;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $jadwal = Jadwal::with([
            'mataKuliah',
            'dosen',
            'tahunAkademik'
        ])

        ->when($search,function($query) use($search){

            $query->whereHas('mataKuliah',function($q) use($search){

                $q->where('nama_mk','like',"%{$search}%")
                  ->orWhere('kode_mk','like',"%{$search}%");

            });

        })

        ->orderBy('hari')

        ->orderBy('jam_mulai')

        ->paginate(10);

        return view(
            'admin.jadwal.index',
            compact(
                'jadwal',
                'search'
            )
        );
    }

    public function create()
    {
        return view(
            'admin.jadwal.create',
            [
                'mataKuliah'=>MataKuliah::orderBy('nama_mk')->get(),
                'dosen'=>Dosen::orderBy('nama')->get(),
                'tahunAkademik'=>TahunAkademik::orderByDesc('id')->get()
            ]
        );
    }

    public function store(Request $request)
    {
        $request->validate([

            'mata_kuliah_id'=>'required',

            'dosen_id'=>'required',

            'tahun_akademik_id'=>'required',

            'hari'=>'required',

            'jam_mulai'=>'required',

            'jam_selesai'=>'required'

        ]);

        Jadwal::create($request->all());

        return redirect()

            ->route('admin.jadwal.index')

            ->with(
                'success',
                'Jadwal berhasil ditambahkan.'
            );
    }
        public function edit(Jadwal $jadwal)
    {
        return view(
            'admin.jadwal.edit',
            [
                'jadwal'=>$jadwal,
                'mataKuliah'=>MataKuliah::orderBy('nama_mk')->get(),
                'dosen'=>Dosen::orderBy('nama')->get(),
                'tahunAkademik'=>TahunAkademik::orderByDesc('id')->get()
            ]
        );
    }

    public function update(Request $request,Jadwal $jadwal)
    {
        $request->validate([

            'mata_kuliah_id'=>'required',

            'dosen_id'=>'required',

            'tahun_akademik_id'=>'required',

            'hari'=>'required',

            'jam_mulai'=>'required',

            'jam_selesai'=>'required'

        ]);

        $jadwal->update($request->all());

        return redirect()

            ->route('admin.jadwal.index')

            ->with(
                'success',
                'Jadwal berhasil diperbarui.'
            );
    }

    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();

        return redirect()

            ->route('admin.jadwal.index')

            ->with(
                'success',
                'Jadwal berhasil dihapus.'
            );
    }
}