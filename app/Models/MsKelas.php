<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MsKelas extends Model
{
    protected $guarded = [];

    // Untuk relasi ke tb ms_jurusans
    public function relasi_jurusan(){
        return $this->belongsTo(MsJurusan::class,'jurusan_kelas','id');
    }
    
}
