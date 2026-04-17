<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Jurusan extends Model
{
    protected $table = 'tb_jurusan';
    protected $primaryKey = 'id_jurusan';

    protected $fillable = ['nama_jurusan','akreditasi'];

    public function mahasiswa(){
        return $this->hasMany(Mahasiswa::class,'id_jurusan');
    }

    public function matakuliah(){
        return $this->hasMany(MataKuliah::class,'id_jurusan');
    }
}