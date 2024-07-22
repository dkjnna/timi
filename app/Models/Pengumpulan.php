<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumpulan extends Model
{
    use HasFactory;

    protected $table = 'pengumpulans';
    protected $fillable = ['id_tugas', 'id_kelas', 'id_siswa', 'id_mapel', 'id_guru', 'tgl','jawaban', 'nilai', 'status'];

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru');
    }

    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'id_mapel');
    }

    public function tugas()
    {
        return $this->belongsTo(Tugas::class, 'id_tugas');
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa');
    }
}

