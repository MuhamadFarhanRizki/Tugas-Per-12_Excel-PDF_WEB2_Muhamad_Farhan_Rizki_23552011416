<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MataKuliah extends Model
{
    protected $table = 'tb_matakuliah';
    protected $primaryKey = 'id_matakuliah';

    protected $fillable = ['nama_matakuliah','sks','id_jurusan'];

    public function jurusan(){
        return $this->belongsTo(Jurusan::class,'id_jurusan');
    }
}