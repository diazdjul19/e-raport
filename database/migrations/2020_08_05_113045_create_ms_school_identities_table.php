<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMsSchoolIdentitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ms_school_identities', function (Blueprint $table) {
            $table->id();
            $table->string('nama_sekolah');
            $table->string('NPSN');
            $table->string('alamat_sekolah');
            $table->string('kelurahan');
            $table->string('kecamatan');
            $table->string('kota_kabupaten');
            $table->string('provinsi');
            $table->string('website_resmi_sekolah');
            $table->string('no_telpon_sekolah');
            $table->string('email_sekolah');
            $table->string('logo_sekolah')->nullable();
            $table->text('iframe_sekolah')->nullable();
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
        Schema::dropIfExists('ms_school_identities');
    }
}




            