@extends('layouts.master_admin_e-raport')

@section('br-mainpanel')
    {{-- br-header --}}
    <div class="br-pageheader">
        <nav class="breadcru pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('home')}}">E-Raport</a>
            <a class="breadcrumb-item" href="#">Management Siswa</a>

            @if (request()->is('management-edit-data-students-data-baru/*'))
                <a class="breadcrumb-item" href="{{route('management-data-baru')}}">Management Data Baru</a>
            @elseif(request()->is('management-edit-data-students-kelas-10/*'))
                <a class="breadcrumb-item" href="{{route('management-students-kelas-10')}}">Management Data Kelas 10</a>
                <a class="breadcrumb-item" href="{{route('management-students-kelas-10-table', $data->relasi_sekarang_kelas->id)}}">{{$data->relasi_sekarang_kelas->nama_kelas}}</a>
            @elseif(request()->is('management-edit-data-students-kelas-11/*'))
                <a class="breadcrumb-item" href="{{route('management-students-kelas-11')}}">Management Data Kelas 11</a>
                <a class="breadcrumb-item" href="{{route('management-students-kelas-11-table', $data->relasi_sekarang_kelas->id)}}">{{$data->relasi_sekarang_kelas->nama_kelas}}</a>
            @elseif(request()->is('management-edit-data-students-kelas-12/*'))
                <a class="breadcrumb-item" href="{{route('management-students-kelas-12')}}">Management Data Kelas 12</a>
                <a class="breadcrumb-item" href="{{route('management-students-kelas-12-table', $data->relasi_sekarang_kelas->id)}}">{{$data->relasi_sekarang_kelas->nama_kelas}}</a>
            @endif

            <span class="breadcrumb-item active">{{$data->nama_peserta_didik}}</span>
        </nav>
    </div><!-- br-pageheader -->

    {{-- br-title --}}
    <div class="br-pagetitle">
        <i class="far fa-edit" style="font-size:65px;color:#000;"></i>
        <div>
            <h4>Edit Data Baru</h4>
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

        @if ($message = Session::get('password_tidak_cocok'))
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
                        <form class="form-sample" action="{{route('management-edit-data-students-all', $data->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{method_field('put')}}
                            <h6 style="font-weight: bold;color:black; font-style: italic;">FIELD DATA SISWA</h6>

                                {{-- Start Data from route --}}
                                @if (request()->is('management-edit-data-students-data-baru/*'))
                                    <input type="hidden" name="from_route_edit" value="management-edit-data-students-data-baru">
                                    <input type="hidden" name="redirect_route" value="management-data-baru">
                                    
                                @elseif(request()->is('management-edit-data-students-kelas-10/*'))
                                    <input type="hidden" name="from_route_edit" value="management-edit-data-students-kelas-10">
                                    <input type="hidden" name="redirect_route" value="management-students-kelas-10-table">
                                    <input type="hidden" name="id_kelas" value="{{$data->relasi_sekarang_kelas->id}}">

                                @elseif(request()->is('management-edit-data-students-kelas-11/*'))
                                    <input type="hidden" name="from_route_edit" value="management-edit-data-students-kelas-11">
                                    <input type="hidden" name="redirect_route" value="management-students-kelas-11-table">
                                    <input type="hidden" name="id_kelas" value="{{$data->relasi_sekarang_kelas->id}}">

                                @elseif(request()->is('management-edit-data-students-kelas-12/*'))
                                    <input type="hidden" name="from_route_edit" value="management-edit-data-students-kelas-12">
                                    <input type="hidden" name="redirect_route" value="management-students-kelas-12-table">
                                    <input type="hidden" name="id_kelas" value="{{$data->relasi_sekarang_kelas->id}}">
                                    
                                @endif
                                {{-- Finish Data from route --}}

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama Peserta Didik <span style="color:red;"> *</span></label>
                                            <input type="text" name="nama_peserta_didik" class="form-control" id="exampleInputEmail1"  placeholder="Nama Peserta Didik" required autocomplete="off" value="{{$data->nama_peserta_didik}}">
                                            <span class="text-danger">{{ $errors->first('nama_peserta_didik') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">NIS<span style="color:red;"> *</span></label>
                                            <input type="atribut" min="0" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57" name="nis" class="form-control" id="exampleInputEmail1"  placeholder="(Max : 12 Digit)" required minlength="0" maxlength="12" autocomplete="off" value="{{$data->nis}}">
                                            <span class="text-danger">{{ $errors->first('nis') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">NISN<span style="color:red;"> *</span></label>
                                            <input type="atribut" min="0" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57" name="nisn" class="form-control" id="exampleInputEmail1"  placeholder="(Max : 10 Digit)" required minlength="0" maxlength="10" autocomplete="off" value="{{$data->nisn}}">
                                            <span class="text-danger">{{ $errors->first('nisn') }}</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nomor Induk<span style="color:red;"> *</span></label>
                                            <input type="atribut" min="0" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57" name="nomor_induk" class="form-control" id="exampleInputEmail1"  placeholder="(Max : 12 Digit)" required minlength="0" maxlength="12" autocomplete="off" value="{{$data->nomor_induk}}">
                                            <span class="text-danger">{{ $errors->first('nomor_induk') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 ">
                                        <div class="form-group row">                      
                                            <div class="col-md-12">
                                                <label>Jenis Kelamin <span style="color:red;"> *</span></label>
                                                <select class="form-control" id="exampleFormControlSelect1" name="jk_siswa">
                                                    <optgroup label="Gender Lama">
                                                        <option  value="{{$data->jk_siswa}}">
                                                            @if ($data->jk_siswa == 'L')
                                                                <span>Laki-laki</span>
                                                            @elseif($data->jk_siswa == 'P')
                                                                <span>Perempuan</span>    
                                                            @endif
                                                        </option>
                                                    </optgroup>  
                                                    <optgroup label="Gender Baru">  
                                                        <option value="L">Laki-laki</option>
                                                        <option value="P">Perempuan</option>
                                                    </optgroup>
                                                    
                                                </select>
                                            <span class="text-danger">{{ $errors->first('jk_siswa') }}</span>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Agama <span style="color:red;"> *</span></label>
                                            <select class="form-control" name="agama" placeholder="Agama" required>
                                                <optgroup label="Agama Lama">
                                                    <option value="{{$data->agama}}" >{{$data->agama}}</option>
                                                </optgroup>  
                                                <optgroup label="Agama Baru">  
                                                    <option value="Islam">Islam</option>
                                                    <option value="Katolik">Katolik</option>
                                                    <option value="Kristen">Kristen</option>
                                                    <option value="Hindu">Hindu</option>
                                                    <option value="Budha">Budha</option>
                                                    <option value="Konghucu">Konghucu</option>
                                                    <option value="Belum Terdaftar">Belum Terdaftar</option>  
                                                </optgroup>     
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
                                                    <input class="typeahead form-control" name="tempat_lahir" type="text" placeholder="Kota Lahir" value="{{$data->tempat_lahir}}">                   
                                                </div>
                                            </div>
                                            <div class="col-7">
                                                <label>Tanggal Lahir</label>
                                                <div id="bloodhound">
                                                    <input class="typeahead form-control" name="tanggal_lahir" type="date" value="{{$data->tanggal_lahir}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Status Dlm Keluarga</label>
                                            <input type="text" name="set_dlm_kel" class="form-control" id="exampleInputEmail1"  placeholder="Status Dlm Keluarga" value="{{$data->set_dlm_kel}}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group row">                      
                                            <div class="col">
                                                <label>Anak Ke-()</label>
                                                <div id="the-basics">
                                                    <input class="typeahead form-control" name="anak_ke" type="atribut" min="0" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57" id="exampleInputEmail1"  minlength="0" maxlength="10" placeholder="" value="{{$data->anak_ke}}">                   
                                                </div>
                                            </div>
                                            <div class="col">
                                                <label>Dari-() Bersaudara</label>
                                                <div id="bloodhound">
                                                    <input class="typeahead form-control" name="dari_berapa_bersaudara" type="atribut" min="0" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57" id="exampleInputEmail1"  minlength="0" maxlength="10" placeholder="" value="{{$data->dari_berapa_bersaudara}}">                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">No Telpon</label>
                                            <input type="text" name="nomor_telpon_siswa" class="form-control" id="exampleInputEmail1"  placeholder="No Telpon Siswa (Jika Ada)" value="{{$data->nomor_telpon_siswa}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email</label>
                                            <input type="email" name="email_siswa" class="form-control" id="exampleInputEmail1"  placeholder="Email Siswa (Jika Ada)" value="{{$data->email_siswa}}" >
                                        </div>
                                    </div>  
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Sekolah Asal</label>
                                            <input type="text" name="sekolah_asal" class="form-control" id="exampleInputEmail1"  placeholder="example : SMPN 35 Bekasi" value="{{$data->sekolah_asal}}" >
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Alamat Peserta Didik</label>
                                            <input type="text" name="alamat_peserta_didik" class="form-control" id="exampleInputEmail1"  placeholder="Note : Tuliskan Alamat Jalan, Rt, Rw, Kelurahan, Kecamatan, Kota/Kabupaten" value="{{$data->alamat_peserta_didik}}">
                                        </div>
                                    </div> 
                                    <div class="col-md-4">
                                        <label for="exampleInputEmail1">Foto Siswa</label>                                   
                                        <div class="form-group">
                                            @if($data->foto_siswa == null)
                                                <img src="/bracket-master/app/img/nopicture.png"width="70px">
                                            @elseif($data->foto_siswa)
                                                <img src="{{url('/storage/foto_siswa/'.$data->foto_siswa)}}"width="70px">
                                            @endif                  
                                            <input type="file" name="foto_siswa" class="form-control" id="exampleInputEmail1"  placeholder="" >
                                        </div>
                                    </div> 
                                </div>

                            @if ($data->di_terima_di_kelas != null)
                                <br>
                                <h6 style="font-weight: bold;color:black; font-style: italic;">FIELD CHECKLIST DATA</h6>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Di Terima Di Kelas</label>
                                                <select class="form-control p-2" id="exampleFormControlSelect1" name="di_terima_di_kelas">
                                                    <optgroup label="Kelas Lama">
                                                        <option value="{{$data->relasi_di_terima_di_kelas ? $data->relasi_di_terima_di_kelas->id : ''}}">{{$data->relasi_di_terima_di_kelas ? $data->relasi_di_terima_di_kelas->nama_kelas : ''}}</option>
                                                    </optgroup>  
                                                    <optgroup label="Kelas Baru">  
                                                        @foreach ($kelas as $item)
                                                            <option value="{{$item->id}}">{{$item->nama_kelas}}</option>
                                                        @endforeach
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Di Terima Pada Tanggal</label>
                                                <input type="date" name="di_terima_pada_tanggal" class="form-control" id="exampleInputEmail1"  placeholder="" value="{{$data->di_terima_pada_tanggal}}" >
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Sekarang Kelas</label>
                                                <select class="form-control p-2" id="exampleFormControlSelect1" name="sekarang_kelas">
                                                    <optgroup label="Kelas Lama">
                                                        <option value="{{$data->relasi_sekarang_kelas ? $data->relasi_sekarang_kelas->id : ''}}">{{$data->relasi_sekarang_kelas ? $data->relasi_sekarang_kelas->nama_kelas : ''}}</option>
                                                    </optgroup>  
                                                    <optgroup label="Kelas Baru">  
                                                        @foreach ($kelas as $item)
                                                            <option value="{{$item->id}}">{{$item->nama_kelas}}</option>
                                                        @endforeach
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                            @elseif($data->di_terima_di_kelas == null)
                                {{-- KOSONGKAN SAJA --}}
                            @endif
                            
                            <br>
                            <h6 style="font-weight: bold;color:black; font-style: italic;">FIELD DATA ORANGTUA</h6>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama Ayah</label>
                                            <input type="text" name="nama_ayah" class="form-control" id="exampleInputEmail1"  placeholder="Nama Ayah" value="{{$data->nama_ayah}}" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama Ibu</label>
                                            <input type="text" name="nama_ibu" class="form-control" id="exampleInputEmail1"  placeholder="Nama Ibu" value="{{$data->nama_ibu}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Pekerjaan Ayah</label>
                                            <input type="text" name="pekerjaan_ayah" class="form-control" id="exampleInputEmail1"  placeholder="Pekerjaan Ayah" value="{{$data->pekerjaan_ayah}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Pekerjaan Ibu</label>
                                            <input type="text" name="pekerjaan_ibu" class="form-control" id="exampleInputEmail1"  placeholder="Pekerjaan Ibu" value="{{$data->pekerjaan_ibu}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">No Telpon Rumah</label>
                                            <input type="text" name="nomor_telpon_rumah" class="form-control" id="exampleInputEmail1" type="atribut" min="0" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57" placeholder="" value="{{$data->nomor_telpon_rumah}}" >
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Alamat OrangTua</label>
                                            <input type="text" name="alamat_orangtua" class="form-control" id="exampleInputEmail1"  placeholder="Note : Tuliskan Alamat Jalan, Rt, Rw, Kelurahan, Kecamatan, Kota/Kabupaten" value="{{$data->alamat_orangtua}}">
                                        </div>
                                    </div>  
                                </div>

                            <br>
                            <h6 style="font-weight: bold;color:black; font-style: italic;">FIELD DATA WALI</h6>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama Wali</label>
                                            <input type="text" name="nama_wali" class="form-control" id="exampleInputEmail1"  placeholder="Nama Wali" value="{{$data->nama_wali}}" >
                                        </div>
                                    </div>
                                    <div class="col-md-4 ">
                                        <div class="form-group row">                      
                                            <div class="col-md-12">
                                                <label>Jenis Kelamin</label>
                                                <select class="form-control" id="exampleFormControlSelect1" name="jk_wali">
                                                    <optgroup label="Gender Lama">
                                                        <option  value="{{$data->jk_wali}}">
                                                            @if ($data->jk_wali == 'L')
                                                                <span>Laki-laki</span>
                                                            @elseif($data->jk_wali == 'P')
                                                                <span>Perempuan</span>    
                                                            @endif
                                                        </option>
                                                    </optgroup>  
                                                    <optgroup label="Gender Baru">  
                                                        <option value="L">Laki-laki</option>
                                                        <option value="P">Perempuan</option>
                                                    </optgroup>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Pekerjaan Wali</label>
                                            <input type="text" name="pekerjaan_wali" class="form-control" id="exampleInputEmail1"  placeholder="Pekerjaan Wali" value="{{$data->pekerjaan_wali}}" >
                                        </div>
                                    </div>
                                </div>

                            <br>
                            <br>
                            <br>
                            
                            <h6 style="font-weight: bold;color:black; font-style: italic;">FIELD EDIT USERNAME & PASSWORD</h6>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Username</label>                                    
                                            
                                                <input id="name" type="text" class="form-control" name="username" value="{{$data->username}}" required autocomplete="off" minlength="0" maxlength="10" placeholder="(Panjang Maximal 10 Digit)" pattern="[a-zA-Z0-9]+" oninvalid="this.setCustomValidity('Input Khusus Huruf & Angka Tidak Boleh Menggunakan SPASI, Segera Refrest Halaman Ini !!!')" >
                                                <span class="text-danger"></span>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">                      
                                                <label for="exampleInputEmail1">Status User <span style="color:red;"> *</span></label>                                    
                                                
                                                    <select class="form-control" name="status" placeholder="status" required>
                                                        <optgroup label="Status Lama">
                                                            <option  value="{{$data->status}}">
                                                                @if ($data->status == 'active')
                                                                    <span>Aktif</span>
                                                                @elseif($data->status == 'not_active')
                                                                    <span>Not Active</span>    
                                                                @endif
                                                            </option>
                                                        </optgroup>  
                                                        <optgroup label="Status Baru">  
                                                            <option value="active">Active</option>
                                                            <option value="not_active">Not Active</option>
                                                        </optgroup>
                                                    </select>
                                                
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="" for="exampleInputEmail1">Password Baru</label>
                                        
                                            <div class="input-group">
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password"  autocomplete="new-password" placeholder="Password Baru">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <div class="input-group-append">
                                                    <div class="input-group-text"><i class="fa fa-eye" arial-hidden="true" id="eye1" onclick="toggle1()"></i></div>
                                                </div>
                                            </div>
                                            @if ($message = Session::get('password_tidak_cocok'))
                                                <strong style="color:red;">{{ $message }}</strong>
                                            @endif
                                        
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="" for="exampleInputEmail1">Password Confirmation</label>                                
                                        
                                            <div class="input-group">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password" placeholder="Confirm Password Baru">
                                                <div class="input-group-append">
                                                    <div class="input-group-text"><i class="fa fa-eye" arial-hidden="true" id="eye2" onclick="toggle2()"></i></div>
                                                </div>
                                            </div>
                                            @if ($message = Session::get('password_tidak_cocok'))
                                                <strong style="color:red;">{{ $message }}</strong>
                                            @endif
                                        
                                        </div>
                                    </div>
                                </div>

                            <br>
                            <a href="{{ url()->previous() }}" class="btn btn-outline-warning btn-sm"><i class="far fa-arrow-alt-circle-left pr-2"></i>Kembali</a>
                            <button type="submit" class="btn btn-outline-primary btn-sm"><i class="fas fa-save pr-2"></i>Simpan</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('footer-admin')
    <script>
        var state= false;
        function toggle1() {
            if (state) {
                document.getElementById(
                    "password").
                    setAttribute("type", "password");
                document.getElementById(
                    "eye1").style.color='#7a797e';
                state = false;
            }else{
                document.getElementById(
                    "password").
                    setAttribute("type", "text");
                document.getElementById(
                    "eye1").style.color='#5887ef';
                state = true;
            }
        }

        function toggle2() {
            if (state) {
                document.getElementById(
                    "password-confirm").
                    setAttribute("type", "password");
                document.getElementById(
                    "eye2").style.color='#7a797e';
                state = false;
            }else{
                document.getElementById(
                    "password-confirm").
                    setAttribute("type", "text");
                document.getElementById(
                    "eye2").style.color='#5887ef';
                state = true;
            }
        }
    </script>
@endpush