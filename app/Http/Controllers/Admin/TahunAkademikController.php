<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TahunAkademik;
use Illuminate\Http\Request;

class TahunAkademikController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $tahunAkademik = TahunAkademik::when($search,function($query) use($search){

            $query->where('tahun','like',"%{$search}%");

        })

        ->orderByDesc('id')

        ->paginate(10);

        return view(
            'admin.tahun-akademik.index',
            compact(
                'tahunAkademik',
                'search'
            )
        );
    }

    public function create()
    {
        return view('admin.tahun-akademik.create');
    }

    public function store(Request $request)
    {
        $request->validate([

            'tahun'=>'required',

            'semester'=>'required',

            'status'=>'required'

        ]);

        if($request->status=="Aktif"){

            TahunAkademik::query()->update([
                'status'=>'Tidak Aktif'
            ]);

        }

        TahunAkademik::create($request->all());

        return redirect()

            ->route('admin.tahun-akademik.index')

            ->with(
                'success',
                'Tahun Akademik berhasil ditambahkan.'
            );
    }

    public function edit(TahunAkademik $tahunAkademik)
    {
        return view(
            'admin.tahun-akademik.edit',
            compact('tahunAkademik')
        );
    }

    public function update(Request $request,TahunAkademik $tahunAkademik)
    {
        $request->validate([

            'tahun'=>'required',

            'semester'=>'required',

            'status'=>'required'

        ]);

        if($request->status=="Aktif"){

            TahunAkademik::query()->update([
                'status'=>'Tidak Aktif'
            ]);

        }

        $tahunAkademik->update($request->all());

        return redirect()

            ->route('admin.tahun-akademik.index')

            ->with(
                'success',
                'Tahun Akademik berhasil diperbarui.'
            );
    }

    public function destroy(TahunAkademik $tahunAkademik)
    {
        $tahunAkademik->delete();

        return redirect()

            ->route('admin.tahun-akademik.index')

            ->with(
                'success',
                'Tahun Akademik berhasil dihapus.'
            );
    }
}