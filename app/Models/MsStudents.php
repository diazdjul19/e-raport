<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MsStudents extends Model
{
    protected $guarded = [];
    
    // Untuk relasi ke tb ms_kelas
    public function relasi_di_terima_di_kelas(){
        return $this->belongsTo(MsKelas::class,'di_terima_di_kelas','id');
    }

    public function relasi_sekarang_kelas(){
        return $this->belongsTo(MsKelas::class,'sekarang_kelas','id');
    }
}
