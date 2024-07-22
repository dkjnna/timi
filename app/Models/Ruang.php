<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruang extends Model
{
    use HasFactory;
    protected $table='ruangs';
    protected $fillable = ['id_kelas', 'id_guru'];

    public function kelas()
{
    return $this->belongsTo(Kelas::class, 'id_kelas');
}
public function guru()
{
    return $this->belongsTo(Guru::class, 'id_guru', 'id');
}
}
