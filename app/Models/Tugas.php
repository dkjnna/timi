<?php

namespace App\Models;
use App\Models\Guru;
use App\Models\Mapel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;
    protected $table = 'tugas';
    protected $fillable = ['id_kelas', 'id_guru', 'id_mapel', 'tanggal', 'tugas', 'tenggat'];

    public function guru()
{
    return $this->belongsTo(Guru::class, 'id_guru', 'id');
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
