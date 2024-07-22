<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswas';
    protected $fillable = ['nama', 'email', 'nisn', 'alamat', 'notlp', 'id_kelas', 'absen', 'password'];

    public function guru()
{
    return $this->belongsTo(Guru::class, 'id_guru');
}

    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'id_mapel');
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }
}
