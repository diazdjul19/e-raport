@extends('layouts.master_admin_e-raport')

@section('br-mainpanel')
    {{-- br-header --}}
    <div class="br-pageheader">
        <nav class="breadcru pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('home')}}">E-Raport</a>
            <a class="breadcrumb-item" href="#">Management Guru</a>
            <a class="breadcrumb-item" href="{{route('teacher.index')}}">Management Guru</a>
            <span class="breadcrumb-item active">Tambah Guru</span>
        </nav>
    </div><!-- br-pageheader -->

    {{-- br-title --}}
    <div class="br-pagetitle">
        <i class="fa fa-plus-circle" style="font-size:65px;color:#000;"></i>
        <div>
            <h4>Tambah Guru</h4>
            <p class="mg-b-0">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
        </div>
    </div>

    {{-- br-body --}}
    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <div class="row justify-content-center">
                <div class="col-12 grid-margin">
                        <div class="d-md-flex align-items-center mb-4">
                            {{-- <a href="{{route('teacher.index')}}" style="font-size:25px; margin-right:10px; text-decoration:none;">
                                <i class="far fa-arrow-alt-circle-left mt-2" style="font-size:30px;"></i>
                            </a> --}}
                            <h4 class="card-title mb-md-0">Tambah Data Guru</h4>
                        </div>
                        <br>                
                        <form class="form-sample" action="{{route('teacher.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama Guru <span style="color:red;"> *</span></label>
                                            <input type="text" name="nama_guru" class="form-control" id="exampleInputEmail1"  placeholder="Nama Guru" required autocomplete="off">
                                            <span class="text-danger">{{ $errors->first('nama_guru') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">NIP<span style="color:red;"> *</span></label>
                                            <input type="atribut" min="0" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57" name="nip" class="form-control" id="exampleInputEmail1"  placeholder="(Max : 18 Digit)" required minlength="0" maxlength="18" autocomplete="off">
                                            <span class="text-danger">{{ $errors->first('nip') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">NUPTK<span style="color:red;"> *</span></label>
                                            <input type="atribut" min="0" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57" name="nuptk" class="form-control" id="exampleInputEmail1"  placeholder="(Max : 16 Digit)" required minlength="0" maxlength="16" autocomplete="off">
                                            <span class="text-danger">{{ $errors->first('nuptk') }}</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Jabatan Fungsional</label>
                                            <input type="text" name="jabatan_fungsional" class="form-control" id="exampleInputEmail1"  placeholder="Jabatan Fungsional">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tipe Guru <span style="color:red;"> *</span></label>
                                            <select class="form-control" name="jenis_guru" placeholder="" required>
                                                    <option value="" disabled selected>Tipe Guru</option>
                                                    <option value="produktif">PRODUKTIF</option>
                                                    <option value="not_produktif">NOT PRODUKTIF</option>
                                            </select>
                                            <span class="text-danger">{{ $errors->first('jenis_guru') }}</span>
                                            {{-- <input type="text" name="jabatan_fungsional" class="form-control" id="exampleInputEmail1"  placeholder="Jabatan Fungsional" required> --}}
                                        </div>
                                    </div>
                                    <div class="col-md-4 ">
                                        <div class="form-group row">                      
                                            <div class="col">
                                                <label>Bidang Study</label>
                                                <div id="the-basics">
                                                    <select class="form-control p-2" id="exampleFormControlSelect1" name="bidang_study">
                                                        <option value="" disabled selected>Pilih Mapel</option>
                                                        @foreach ($bidang_study as $item)
                                                            <option value="{{$item->id}}">{{$item->kode_mapel}}</option>
                                                        @endforeach
                                                    </select>                 
                                                </div>
                                            </div>
                                            <div class="col">
                                                <label>Walas Kelas</label>
                                                <div id="bloodhound">
                                                    <select class="form-control p-2" id="exampleFormControlSelect1" name="walas_kelas">
                                                        <option value="" disabled selected>Pilih Kelas</option>
                                                        @foreach ($walas_kelas as $item)
                                                            <option value="{{$item->id}}">{{$item->nama_kelas}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
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
                                    <div class="col-md-4 ">
                                        <div class="form-group row">                      
                                            <div class="col-md-12">
                                                <label>Jenis Kelamin <span style="color:red;"> *</span></label>
                                                <select class="form-control" id="exampleFormControlSelect1" name="jenis_kelamin" required>
                                                    <option value="" disabled selected>Pilih Gander</option>
                                                    <option value="laki-laki">Laki-laki</option>
                                                    <option value="perempuan">Perempuan</option>
                                                </select>
                                                <span class="text-danger">{{ $errors->first('jenis_kelamin') }}</span>
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
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">No Telpon</label>
                                            <input type="text" name="no_telpon_guru" class="form-control" id="exampleInputEmail1"  placeholder="No Telpon" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email Guru</label>
                                            <input type="email" name="email_guru" class="form-control" id="exampleInputEmail1"  placeholder="Email Guru" >
                                        </div>
                                    </div>  
                                    <div class="col-md-4">
                                        <div class="form-group">                      
                                            <label for="exampleInputEmail1">Foto Guru</label>                                   
                                            <input type="file" name="foto_guru" class="form-control" id="exampleInputEmail1"  placeholder="Foto Guru" >
                                        </div>
                                    </div>
                                </div>

                                <a href="{{route('teacher.index')}}" class="btn btn-outline-warning btn-sm"><i class="far fa-arrow-alt-circle-left pr-2"></i>Kembali</a>
                                <button type="submit" class="btn btn-outline-primary btn-sm"><i class="fas fa-save pr-2"></i>Simpan</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
@endsection