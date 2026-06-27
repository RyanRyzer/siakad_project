<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProgramStudi;
use App\Models\Fakultas;
use Illuminate\Http\Request;

class ProgramStudiController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $programStudi = ProgramStudi::with('fakultas')

            ->when($search, function ($query) use ($search) {

                $query->where('kode_prodi', 'like', "%{$search}%")
                    ->orWhere('nama_prodi', 'like', "%{$search}%");

            })

            ->orderBy('id', 'desc')

            ->paginate(10);

        return view(
            'admin.program-studi.index',
            compact('programStudi', 'search')
        );
    }

    public function create()
    {
        $fakultas = Fakultas::orderBy('nama_fakultas')->get();

        return view(
            'admin.program-studi.create',
            compact('fakultas')
        );
    }

    public function store(Request $request)
    {
        $request->validate([

            'fakultas_id' => 'required',

            'kode_prodi' => 'required|max:20|unique:program_studi,kode_prodi',

            'nama_prodi' => 'required|max:100',

        ]);

        ProgramStudi::create($request->all());

        return redirect()

            ->route('admin.program-studi.index')

            ->with('success', 'Program Studi berhasil ditambahkan.');
    }
        public function edit(ProgramStudi $programStudium)
    {
        $fakultas = Fakultas::orderBy('nama_fakultas')->get();

        return view(
            'admin.program-studi.edit',
            [
                'programStudi' => $programStudium,
                'fakultas' => $fakultas
            ]
        );
    }

    public function update(Request $request, ProgramStudi $programStudium)
    {
        $request->validate([

            'fakultas_id' => 'required',

            'kode_prodi' => 'required|max:20|unique:program_studi,kode_prodi,' . $programStudium->id,

            'nama_prodi' => 'required|max:100',

        ]);

        $programStudium->update($request->all());

        return redirect()

            ->route('admin.program-studi.index')

            ->with('success', 'Program Studi berhasil diperbarui.');
    }

    public function destroy(ProgramStudi $programStudium)
    {
        $programStudium->delete();

        return redirect()

            ->route('admin.program-studi.index')

            ->with('success', 'Program Studi berhasil dihapus.');
    }
}