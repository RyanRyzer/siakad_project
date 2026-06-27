<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Fakultas;
use Illuminate\Http\Request;

class FakultasController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $fakultas = Fakultas::when($search, function ($query) use ($search) {

            $query->where('kode_fakultas', 'like', "%{$search}%")
                  ->orWhere('nama_fakultas', 'like', "%{$search}%");

        })
        ->orderBy('id', 'desc')
        ->paginate(10);

        return view('admin.fakultas.index', compact('fakultas', 'search'));
    }

    public function create()
    {
        return view('admin.fakultas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_fakultas' => 'required|max:20|unique:fakultas,kode_fakultas',
            'nama_fakultas' => 'required|max:100'
        ]);

        Fakultas::create($request->all());

        return redirect()
            ->route('admin.fakultas.index')
            ->with('success', 'Data fakultas berhasil ditambahkan.');
    }

    public function edit(Fakultas $fakultum)
    {
        return view('admin.fakultas.edit', [
            'fakultas' => $fakultum
        ]);
    }

    public function update(Request $request, Fakultas $fakultum)
    {
        $request->validate([
            'kode_fakultas' => 'required|max:20|unique:fakultas,kode_fakultas,' . $fakultum->id,
            'nama_fakultas' => 'required|max:100'
        ]);

        $fakultum->update($request->all());

        return redirect()
            ->route('admin.fakultas.index')
            ->with('success', 'Data fakultas berhasil diperbarui.');
    }

    public function destroy(Fakultas $fakultum)
    {
        $fakultum->delete();

        return redirect()
            ->route('admin.fakultas.index')
            ->with('success', 'Data fakultas berhasil dihapus.');
    }
}