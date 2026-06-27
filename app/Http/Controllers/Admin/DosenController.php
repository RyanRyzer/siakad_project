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

                $query->where('nidn','like',"%{$search}%")

                    ->orWhere('nama','like',"%{$search}%");

            })

            ->orderBy('id','desc')

            ->paginate(10);

        return view(
            'admin.dosen.index',
            compact('dosen','search')
        );
    }

    public function create()
    {
        $users = User::where('role','dosen')->get();

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

            'user_id'=>'required|unique:dosen,user_id',

            'program_studi_id'=>'required',

            'nidn'=>'required|unique:dosen,nidn',

            'nama'=>'required',

            'jenis_kelamin'=>'required',

            'alamat'=>'required',

            'no_hp'=>'required',

            'email'=>'required|email'

        ]);

        Dosen::create($request->all());

        return redirect()

            ->route('admin.dosen.index')

            ->with(
                'success',
                'Data dosen berhasil ditambahkan.'
            );
    }