<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwal';

    protected $fillable = [
        'mata_kuliah_id',
        'dosen_id',
        'tahun_akademik_id',
        'hari',
        'jam_mulai',
        'jam_selesai'
    ];

    public function mataKuliah()
    {
        return $this->belongsTo(MataKuliah::class);
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }

    public function tahunAkademik()
    {
        return $this->belongsTo(TahunAkademik::class);
    }

    public function detailKrs()
    {
        return $this->hasMany(DetailKrs::class);
    }

    public function nilai()
    {
        return $this->hasMany(Nilai::class);
    }
}