<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailKrs extends Model
{
    use HasFactory;

    protected $table = 'detail_krs';

    protected $fillable = [
        'krs_id',
        'jadwal_id'
    ];

    public function krs()
    {
        return $this->belongsTo(Krs::class);
    }

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }

    public function nilai()
    {
        return Nilai::where(
            'jadwal_id',
            $this->jadwal_id
        )

        ->where(
            'mahasiswa_id',
            optional($this->krs)->mahasiswa_id
        )

        ->first();
    }
}