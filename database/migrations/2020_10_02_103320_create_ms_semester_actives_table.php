<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMsSemesterActivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ms_semester_actives', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kepsek');
            $table->string('nip_kepsek')->nullable();
            $table->string('pts_pas');
            $table->string('semester');
            $table->string('tahun_ajaran');
            $table->date('dari_tanggal');
            $table->date('sampai_tanggal');
            $table->date('tgl_pembagian_raport');
            $table->string('status');
            
            


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ms_semester_actives');
    }
}
