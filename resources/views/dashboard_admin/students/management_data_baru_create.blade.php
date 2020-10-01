@extends('layouts.master_admin_e-raport')

@section('br-mainpanel')
    {{-- br-header --}}
    <div class="br-pageheader">
        <nav class="breadcru pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('home')}}">E-Raport</a>
            <a class="breadcrumb-item" href="#">Management Siswa</a>
            <a class="breadcrumb-item" href="{{route('management-data-baru')}}">Management Data Baru</a>
            <span class="breadcrumb-item active">Tambah Data Baru</span>
        </nav>
    </div><!-- br-pageheader -->

    {{-- br-title --}}
    <div class="br-pagetitle">
        <i class="icon ion-person-add" style="font-size:65px;color:#000;"></i>
        <div>
            <h4>Tambah Data Baru</h4>
            <p class="mg-b-0">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
        </div>
    </div>

    {{-- br-body --}}
    <div class="br-pagebody">
        @if ($message = Session::get('error_data_double'))
            <div class="alert alert-danger alert-bordered pd-y-20" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                <div class="d-sm-flex align-items-center justify-content-start">
                <i class="icon ion-ios-close alert-icon tx-52 tx-danger mg-r-20"></i>
                <div class="mg-t-20 mg-sm-t-0">
                    <h5 class="mg-b-2 tx-danger">Gagal Menambahkan Data</h5>
                    <p class="mg-b-0 tx-gray">{{$message}}</p>
                </div>
                </div><!-- d-flex -->
            </div><!-- alert -->
        @endif

        <div class="br-section-wrapper">
            <h6 class="br-section-label">Form Pembuatan Data Baru Siswa</h6>
            <p class="br-section-text">Note : Field yang memiliki tanda ("<span style="color:red;"> * </span>") Wajib Di Isi.</p>
            <div class="row justify-content-center">
                <div class="col-12 grid-margin">                
                        <form class="form-sample" action="{{route('management-data-baru-store')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <h6 style="font-weight: bold;color:black; font-style: italic;">FIELD DATA SISWA</h6>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama Peserta Didik <span style="color:red;"> *</span></label>
                                            <input type="text" name="nama_peserta_didik" class="form-control" id="exampleInputEmail1"  placeholder="Nama Peserta Didik" required autocomplete="off">
                                            <span class="text-danger">{{ $errors->first('nama_peserta_didik') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">NIS<span style="color:red;"> *</span></label>
                                            <input type="atribut" min="0" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57" name="nis" class="form-control" id="exampleInputEmail1"  placeholder="(Max : 12 Digit)" required minlength="0" maxlength="12" autocomplete="off">
                                            <span class="text-danger">{{ $errors->first('nis') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">NISN<span style="color:red;"> *</span></label>
                                            <input type="atribut" min="0" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57" name="nisn" class="form-control" id="exampleInputEmail1"  placeholder="(Max : 10 Digit)" required minlength="0" maxlength="10" autocomplete="off">
                                            <span class="text-danger">{{ $errors->first('nisn') }}</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nomor Induk<span style="color:red;"> *</span></label>
                                            <input type="atribut" min="0" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57" name="nomor_induk" class="form-control" id="exampleInputEmail1"  placeholder="(Max : 12 Digit)" required minlength="0" maxlength="12" autocomplete="off">
                                            <span class="text-danger">{{ $errors->first('nomor_induk') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 ">
                                        <div class="form-group row">                      
                                            <div class="col-md-12">
                                                <label>Jenis Kelamin <span style="color:red;"> *</span></label>
                                                <select class="form-control" id="exampleFormControlSelect1" name="jk_siswa">
                                                    <option value="" disabled selected>Pilih Gander</option>
                                                    <option value="L">Laki-laki</option>
                                                    <option value="P">Perempuan</option>
                                                </select>
                                            <span class="text-danger">{{ $errors->first('jk_siswa') }}</span>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Agama <span style="color:red;"> *</span></label>
                                            <select class="form-control" name="agama" placeholder="Agama" required>
                                                <option value="" disabled selected>Agama</option>
                                                <option value="Islam">Islam</option>
                                                <option value="Katolik">Katolik</option>
                                                <option value="Kristen">Kristen</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Budha">Budha</option>
                                                <option value="Konghucu">Konghucu</option>
                                                <option value="Belum Terdaftar">Belum Terdaftar</option>       
                                            </select>
                                            <span class="text-danger">{{ $errors->first('agama') }}</span>
                                        </div>
                                    </div> 
                                    
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group row">                      
                                            <div class="col-5">
                                                <label>Tempat Lahir</label>
                                                <div id="the-basics">
                                                    <input class="typeahead form-control" name="tempat_lahir" type="text" placeholder="Kota Lahir">                   
                                                </div>
                                            </div>
                                            <div class="col-7">
                                                <label>Tanggal Lahir</label>
                                                <div id="bloodhound">
                                                    <input class="typeahead form-control" name="tanggal_lahir" type="date" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Status Dlm Keluarga</label>
                                            <input type="text" name="set_dlm_kel" class="form-control" id="exampleInputEmail1"  placeholder="Status Dlm Keluarga" >
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group row">                      
                                            <div class="col">
                                                <label>Anak Ke-</label>
                                                <div id="the-basics">
                                                    <input class="typeahead form-control" name="anak_ke" type="atribut" min="0" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57" id="exampleInputEmail1"  minlength="0" maxlength="10" placeholder="">                   
                                                </div>
                                            </div>
                                            <div class="col">
                                                <label>Dari-(Bersaudara)</label>
                                                <div id="bloodhound">
                                                    <input class="typeahead form-control" name="dari_berapa_bersaudara" type="atribut" min="0" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57" id="exampleInputEmail1"  minlength="0" maxlength="10" placeholder="">                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">No Telpon</label>
                                            <input type="text" name="nomor_telpon_siswa" class="form-control" id="exampleInputEmail1"  placeholder="No Telpon Siswa (Jika Ada)" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email</label>
                                            <input type="email" name="email_siswa" class="form-control" id="exampleInputEmail1"  placeholder="Email Siswa (Jika Ada)" >
                                        </div>
                                    </div>  
                                    <div class="col-md-4">
                                        <div class="form-group">                      
                                            <label for="exampleInputEmail1">Foto Siswa</label>                                   
                                            <input type="file" name="foto_siswa" class="form-control" id="exampleInputEmail1"  placeholder="" >
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Sekolah Asal</label>
                                            <input type="text" name="sekolah_asal" class="form-control" id="exampleInputEmail1"  placeholder="example : SMPN 35 Bekasi" >
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Alamat Peserta Didik</label>
                                            <input type="text" name="alamat_peserta_didik" class="form-control" id="exampleInputEmail1"  placeholder="Note : Tuliskan Alamat Jalan, Rt, Rw, Kelurahan, Kecamatan, Kota/Kabupaten">
                                        </div>
                                    </div>  
                                </div>
                            
                            <br>
                            <h6 style="font-weight: bold;color:black; font-style: italic;">FIELD DATA ORANGTUA</h6>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama Ayah</label>
                                            <input type="text" name="nama_ayah" class="form-control" id="exampleInputEmail1"  placeholder="Nama Ayah" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama Ibu</label>
                                            <input type="text" name="nama_ibu" class="form-control" id="exampleInputEmail1"  placeholder="Nama Ibu" >
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Pekerjaan Ayah</label>
                                            <input type="text" name="pekerjaan_ayah" class="form-control" id="exampleInputEmail1"  placeholder="Pekerjaan Ayah" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Pekerjaan Ibu</label>
                                            <input type="text" name="pekerjaan_ibu" class="form-control" id="exampleInputEmail1"  placeholder="Pekerjaan Ibu" >
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">No Telpon Rumah</label>
                                            <input type="text" name="nomor_telpon_rumah" class="form-control" id="exampleInputEmail1" type="atribut" min="0" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57" placeholder="No Telpon Rumah (Jika Ada)" >
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Alamat OrangTua</label>
                                            <input type="text" name="alamat_orangtua" class="form-control" id="exampleInputEmail1"  placeholder="Note : Tuliskan Alamat Jalan, Rt, Rw, Kelurahan, Kecamatan, Kota/Kabupaten">
                                        </div>
                                    </div>  
                                </div>

                            <br>
                            <h6 style="font-weight: bold;color:black; font-style: italic;">FIELD DATA WALI</h6>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama Wali</label>
                                            <input type="text" name="nama_wali" class="form-control" id="exampleInputEmail1"  placeholder="Nama Wali" >
                                        </div>
                                    </div>
                                    <div class="col-md-4 ">
                                        <div class="form-group row">                      
                                            <div class="col-md-12">
                                                <label>Jenis Kelamin</label>
                                                <select class="form-control" id="exampleFormControlSelect1" name="jk_wali">
                                                    <option value="" disabled selected>Pilih Gander</option>
                                                    <option value="L">Laki-laki</option>
                                                    <option value="P">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Pekerjaan Wali</label>
                                            <input type="text" name="pekerjaan_wali" class="form-control" id="exampleInputEmail1"  placeholder="Pekerjaan Wali" >
                                        </div>
                                    </div>
                                </div>
                                <br>

                                <a href="{{route('management-data-baru')}}" class="btn btn-outline-warning btn-sm"><i class="far fa-arrow-alt-circle-left pr-2"></i>Kembali</a>
                                <button type="submit" class="btn btn-outline-primary btn-sm"><i class="fas fa-save pr-2"></i>Simpan</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
@endsection
