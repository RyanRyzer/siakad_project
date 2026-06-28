<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\User;
use App\Models\ProgramStudi;
use App\Models\Dosen;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $mahasiswa = Mahasiswa::with([
                'user',
                'programStudi',
                'dosen'
            ])

            ->when($search,function($query) use($search){

                $query->where('nim','like',"%{$search}%")

                      ->orWhere('nama','like',"%{$search}%");

            })

            ->orderBy('id','desc')

            ->paginate(10);

        return view(
            'admin.mahasiswa.index',
            compact(
                'mahasiswa',
                'search'
            )
        );
    }

    public function create()
    {
        $users = User::where('role','mahasiswa')

            ->whereDoesntHave('mahasiswa')

            ->orderBy('username')

            ->get();

        $programStudi = ProgramStudi::orderBy('nama_prodi')->get();

        $dosen = Dosen::orderBy('nama')->get();

        return view(
            'admin.mahasiswa.create',
            compact(
                'users',
                'programStudi',
                'dosen'
            )
        );
    }

    public function store(Request $request)
    {
        $request->validate([

            'user_id'=>'required|unique:mahasiswa,user_id',

            'program_studi_id'=>'required',

            'dosen_id'=>'nullable',

            'nim'=>'required|unique:mahasiswa,nim',

            'nama'=>'required',

            'jenis_kelamin'=>'required',

            'angkatan'=>'required',

            'semester'=>'required',

            'status'=>'required'

        ]);

        Mahasiswa::create($request->all());

        return redirect()

            ->route('admin.mahasiswa.index')

            ->with(
                'success',
                'Data mahasiswa berhasil ditambahkan.'
            );
    }
        public function edit(Mahasiswa $mahasiswa)
    {
        $users = User::where('role', 'mahasiswa')
            ->where(function ($query) use ($mahasiswa) {

                $query->whereDoesntHave('mahasiswa')
                    ->orWhere('id', $mahasiswa->user_id);

            })
            ->orderBy('username')
            ->get();

        $programStudi = ProgramStudi::orderBy('nama_prodi')->get();

        $dosen = Dosen::orderBy('nama')->get();

        return view(
            'admin.mahasiswa.edit',
            compact(
                'mahasiswa',
                'users',
                'programStudi',
                'dosen'
            )
        );
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $request->validate([

            'user_id' => 'required|unique:mahasiswa,user_id,' . $mahasiswa->id,

            'program_studi_id' => 'required',

            'dosen_id' => 'nullable',

            'nim' => 'required|unique:mahasiswa,nim,' . $mahasiswa->id,

            'nama' => 'required|max:100',

            'jenis_kelamin' => 'required',

            'tempat_lahir' => 'nullable|max:100',

            'tanggal_lahir' => 'nullable|date',

            'alamat' => 'nullable',

            'email' => 'nullable|email',

            'no_hp' => 'nullable|max:20',

            'angkatan' => 'required',

            'semester' => 'required',

            'status' => 'required'

        ]);

        $mahasiswa->update($request->all());

        return redirect()
            ->route('admin.mahasiswa.index')
            ->with(
                'success',
                'Data mahasiswa berhasil diperbarui.'
            );
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        return redirect()
            ->route('admin.mahasiswa.index')
            ->with(
                'success',
                'Data mahasiswa berhasil dihapus.'
            );
    }
}