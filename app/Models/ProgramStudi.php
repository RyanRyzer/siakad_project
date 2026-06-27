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
}