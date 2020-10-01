<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MsTeacher extends Model
{
    protected $guarded = [];


    // Untuk relasi ke tb ms_mapel
    public function relasi_bidang_study(){
        return $this->belongsTo(MsMapel::class,'bidang_study','id');
    }

    // Untuk relasi ke tb ms_kelas
    public function relasi_walas_kelas(){
        return $this->belongsTo(MsKelas::class,'walas_kelas','id');
    }

    // public function category(){

    //     return $this->belongsTo(MsCategory::class,'id_category','category_name');
        
    // }
}
