<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MataKuliah;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $mataKuliah = MataKuliah::with('programStudi')

            ->when($search,function($query) use($search){

                $query->where('kode_mk','like',"%{$search}%")

                      ->orWhere('nama_mk','like',"%{$search}%");

            })

            ->orderBy('semester')

            ->orderBy('kode_mk')

            ->paginate(10);

        return view(
            'admin.mata-kuliah.index',
            compact(
                'mataKuliah',
                'search'
            )
        );
    }

    public function create()
    {
        $programStudi = ProgramStudi::orderBy('nama_prodi')->get();

        return view(
            'admin.mata-kuliah.create',
            compact('programStudi')
        );
    }

    public function store(Request $request)
    {
        $request->validate([

            'program_studi_id'=>'required',

            'kode_mk'=>'required|max:20|unique:mata_kuliah,kode_mk',

            'nama_mk'=>'required|max:100',

            'semester'=>'required',

            'sks'=>'required'

        ]);

        MataKuliah::create($request->all());

        return redirect()

            ->route('admin.mata-kuliah.index')

            ->with(
                'success',
                'Mata Kuliah berhasil ditambahkan.'
            );
    }
        public function edit(MataKuliah $mataKuliah)
    {
        $programStudi = ProgramStudi::orderBy('nama_prodi')->get();

        return view(
            'admin.mata-kuliah.edit',
            compact(
                'mataKuliah',
                'programStudi'
            )
        );
    }

    public function update(Request $request,MataKuliah $mataKuliah)
    {
        $request->validate([

            'program_studi_id'=>'required',

            'kode_mk'=>'required|unique:mata_kuliah,kode_mk,'.$mataKuliah->id,

            'nama_mk'=>'required',

            'semester'=>'required',

            'sks'=>'required'

        ]);

        $mataKuliah->update($request->all());

        return redirect()

            ->route('admin.mata-kuliah.index')

            ->with(
                'success',
                'Mata Kuliah berhasil diperbarui.'
            );
    }

    public function destroy(MataKuliah $mataKuliah)
    {
        $mataKuliah->delete();

        return redirect()

            ->route('admin.mata-kuliah.index')

            ->with(
                'success',
                'Mata Kuliah berhasil dihapus.'
            );
    }
}