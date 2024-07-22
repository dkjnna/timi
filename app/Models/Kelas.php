<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $table = 'kelas';
    protected $fillable= ['nama_kelas'];
    public function ruang()
    {
        return $this->hasMany(Ruang::class, 'id_kelas');
    }
    public function materi()
    {
        return $this->hasMany(Materi::class, 'id_kelas');
    }
}
