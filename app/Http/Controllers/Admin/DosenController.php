<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\User;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $dosen = Dosen::with([
                'user',
                'programStudi'
            ])
            ->when($search, function ($query) use ($search) {

                $query->where('nidn', 'like', "%{$search}%")
                    ->orWhere('nama', 'like', "%{$search}%");

            })
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view(
            'admin.dosen.index',
            compact(
                'dosen',
                'search'
            )
        );
    }

    public function create()
    {
        $users = User::where('role', 'dosen')
            ->whereDoesntHave('dosen')
            ->orderBy('username')
            ->get();

        $programStudi = ProgramStudi::orderBy('nama_prodi')->get();

        return view(
            'admin.dosen.create',
            compact(
                'users',
                'programStudi'
            )
        );
    }

    public function store(Request $request)
    {
        $request->validate([

            'user_id' => 'required|unique:dosen,user_id',

            'program_studi_id' => 'required',

            'nidn' => 'required|max:30|unique:dosen,nidn',

            'nama' => 'required|max:100',

            'gelar' => 'nullable|max:50',

            'jenis_kelamin' => 'required',

            'tempat_lahir' => 'nullable|max:100',

            'tanggal_lahir' => 'nullable|date',

            'alamat' => 'nullable',

            'email' => 'nullable|email',

            'no_hp' => 'nullable|max:20',

            'status' => 'required'

        ]);

        Dosen::create($request->all());

        return redirect()
            ->route('admin.dosen.index')
            ->with(
                'success',
                'Data dosen berhasil ditambahkan.'
            );
    }
        public function edit(Dosen $dosen)
    {
        $users = User::where('role', 'dosen')
            ->where(function ($query) use ($dosen) {

                $query->whereDoesntHave('dosen')
                    ->orWhere('id', $dosen->user_id);

            })
            ->orderBy('username')
            ->get();

        $programStudi = ProgramStudi::orderBy('nama_prodi')->get();

        return view(
            'admin.dosen.edit',
            compact(
                'dosen',
                'users',
                'programStudi'
            )
        );
    }

    public function update(Request $request, Dosen $dosen)
    {
        $request->validate([

            'user_id' => 'required|unique:dosen,user_id,' . $dosen->id,

            'program_studi_id' => 'required',

            'nidn' => 'required|max:30|unique:dosen,nidn,' . $dosen->id,

            'nama' => 'required|max:100',

            'gelar' => 'nullable|max:50',

            'jenis_kelamin' => 'required',

            'tempat_lahir' => 'nullable|max:100',

            'tanggal_lahir' => 'nullable|date',

            'alamat' => 'nullable',

            'email' => 'nullable|email',

            'no_hp' => 'nullable|max:20',

            'status' => 'required'

        ]);

        $dosen->update($request->all());

        return redirect()
            ->route('admin.dosen.index')
            ->with(
                'success',
                'Data dosen berhasil diperbarui.'
            );
    }

    public function destroy(Dosen $dosen)
    {
        $dosen->delete();

        return redirect()
            ->route('admin.dosen.index')
            ->with(
                'success',
                'Data dosen berhasil dihapus.'
            );
    }
}