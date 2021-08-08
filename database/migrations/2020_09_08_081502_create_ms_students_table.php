<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMsStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ms_students', function (Blueprint $table) {
            $table->id();
            $table->string('nama_peserta_didik');
            $table->string('nomor_induk');
            $table->string('nis'); 
            $table->string('nisn'); 
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('jk_siswa');
            $table->string('agama')->nullable();
            $table->string('anak_ke')->nullable();
            $table->string('dari_berapa_bersaudara')->nullable();  
            $table->string('set_dlm_kel')->nullable();
            $table->string('alamat_peserta_didik')->nullable();
            $table->string('sekolah_asal')->nullable();
            $table->string('nomor_telpon_siswa')->nullable();
            $table->string('email_siswa')->nullable();
            $table->string('foto_siswa')->nullable();

            $table->string('nama_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('pekerjaan_ayah')->nullable();
            $table->string('pekerjaan_ibu')->nullable();
            $table->string('alamat_orangtua')->nullable();
            $table->string('nama_wali')->nullable();
            $table->string('jk_wali')->nullable();
            $table->string('pekerjaan_wali')->nullable();
            $table->string('nomor_telpon_rumah')->nullable();

            $table->integer('di_terima_di_kelas')->nullable();
            $table->date('di_terima_pada_tanggal')->nullable();
            $table->integer('sekarang_kelas')->nullable();

            $table->string('username')->nullable();
            $table->string('status')->nullable();
            $table->string('password')->nullable();

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
        Schema::dropIfExists('ms_students');
    }
}
