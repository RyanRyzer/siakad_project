<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramStudi extends Model
{
    use HasFactory;

    protected $table = 'program_studi';

    protected $fillable = [
        'fakultas_id',
        'kode_prodi',
        'nama_prodi',
    ];

    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class);
    }

    public function dosen()
{
    return $this->hasMany(Dosen::class);
}

public function mahasiswa()
{
    return $this->hasMany(Mahasiswa::class);
}

public function mataKuliah()
{
    return $this->hasMany(MataKuliah::class);
}
}