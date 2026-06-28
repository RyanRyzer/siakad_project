<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    use HasFactory;

    protected $table = 'mata_kuliah';

    protected $fillable = [
        'program_studi_id',
        'kode_mk',
        'nama_mk',
        'semester',
        'sks'
    ];

    public function programStudi()
    {
        return $this->belongsTo(ProgramStudi::class);
    }

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class);
    }
}