<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMsAbsentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ms_absents', function (Blueprint $table) {
            $table->id();
            $table->string('absent_kelas')->nullable();
            $table->string('th_pelajaran')->nullable();
            $table->string('semester')->nullable();
            $table->date('tgl_bln_thn')->nullable();

            $table->string('nama_siswa')->nullable();
            $table->string('nis_siswa')->nullable();
            $table->string('jml_sakit_bln')->nullable();
            $table->string('jml_izin_bln')->nullable();
            $table->string('jml_alpa_bln')->nullable();

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
        Schema::dropIfExists('ms_absents');
    }
}
