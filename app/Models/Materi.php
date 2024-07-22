<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;
    protected $table= 'materis';
    protected $fillable=['id_kelas', 'id_guru', 'id_mapel', 'materi'];
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

