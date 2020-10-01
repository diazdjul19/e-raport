<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMsTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ms_teachers', function (Blueprint $table) {
            $table->id();
            $table->string('nama_guru');
            $table->string('nuptk');
            $table->string('nip');
            $table->integer('bidang_study')->nullable();
            $table->string('jabatan_fungsional')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('jenis_kelamin');
            $table->string('agama');
            $table->string('jenis_guru');
            $table->string('no_telpon_guru')->nullable();
            $table->string('email_guru')->nullable();
            $table->integer('walas_kelas')->nullable();
            $table->string('foto_guru')->nullable();

            $table->string('status_user');
            $table->string('username')->nullable();
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
        Schema::dropIfExists('ms_teachers');
    }
}
