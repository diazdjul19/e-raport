@extends('layouts.master_admin_e-raport')

@section('br-mainpanel')
    {{-- br-header --}}
    <div class="br-pageheader">
        <nav class="breadcru pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('home')}}">E-Raport</a>
            <a class="breadcrumb-item" href="#">Management Guru</a>
            <a class="breadcrumb-item" href="{{route('teacher.index')}}">Management Guru</a>
            <span class="breadcrumb-item active">Edit Data Guru</span>
        </nav>
    </div><!-- br-pageheader -->

    {{-- br-title --}}
    <div class="br-pagetitle">
        <i class="icon ion-compose" style="font-size:65px;color:#000;"></i>
        <div>
            <h4>Edit Data Guru</h4>
            <p class="mg-b-0">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</p>
        </div>
    </div>

    {{-- br-body --}}
    <div class="br-pagebody">
        @if ($message = Session::get('password_tidak_cocok'))
            <div class="alert alert-danger alert-bordered pd-y-20" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                <div class="d-sm-flex align-items-center justify-content-start">
                <i class="icon ion-ios-close alert-icon tx-52 tx-danger mg-r-20"></i>
                <div class="mg-t-20 mg-sm-t-0">
                    <h5 class="mg-b-2 tx-danger">Gagal Mengedit Data Guru</h5>
                    <p class="mg-b-0 tx-gray">{{$message}}</p>
                </div>
                </div><!-- d-flex -->
            </div><!-- alert -->
        @endif
        
        <div class="br-section-wrapper">
            <div class="row justify-content-center">
                <div class="col-12 grid-margin">
                        <div class="d-md-flex align-items-center mb-4">
                            <h4 class="card-title mb-md-0">Edit Data Guru</h4>
                        </div>
                        <br>                
                        <form class="form-sample" action="{{route('teacher.update', $data->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{method_field('put')}}
                            
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama Guru <span style="color:red;"> *</span></label>
                                            <input type="text" name="nama_guru" class="form-control" id="exampleInputEmail1"  placeholder="Nama Guru" required autocomplete="off" value="{{$data->nama_guru}}">
                                            <span class="text-danger">{{ $errors->first('nama_guru') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">NIP<span style="color:red;"> *</span></label>
                                            <input type="atribut" min="0" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57" name="nip" class="form-control" id="exampleInputEmail1"  placeholder="(Max : 18 Digit)" required minlength="0" maxlength="18" autocomplete="off" value="{{$data->nip}}">
                                            <span class="text-danger">{{ $errors->first('nip') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">NUPTK<span style="color:red;"> *</span></label>
                                            <input type="atribut" min="0" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57" name="nuptk" class="form-control" id="exampleInputEmail1"  placeholder="(Max : 16 Digit)" required minlength="0" maxlength="16" autocomplete="off" value="{{$data->nuptk}}">
                                            <span class="text-danger">{{ $errors->first('nuptk') }}</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Jabatan Fungsional</label>
                                            <input type="text" name="jabatan_fungsional" class="form-control" id="exampleInputEmail1"  placeholder="Jabatan Fungsional" value="{{$data->jabatan_fungsional}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tipe Guru <span style="color:red;"> *</span></label>
                                            <select class="form-control" name="jenis_guru" placeholder="" required>
                                                <optgroup label="Old Type">
                                                    <option  value="{{$data->jenis_guru}}">
                                                        @if ($data->jenis_guru == 'produktif')
                                                            <span>PRODUKTIF</span>
                                                        @elseif($data->jenis_guru == 'not_produktif')
                                                            <span>NOT PRODUKTIF</span>    
                                                        @endif
                                                    </option>
                                                </optgroup>  
                                                <optgroup label="New Type">  
                                                    <option value="produktif">PRODUKTIF</option>
                                                    <option value="not_produktif">NOT PRODUKTIF</option>
                                                </optgroup>
                                            </select>
                                            <span class="text-danger">{{ $errors->first('jenis_guru') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 ">
                                        <div class="form-group row">                      
                                            <div class="col">
                                                <label>Bidang Study</label>
                                                <div id="the-basics">
                                                    <select class="form-control p-2" id="exampleFormControlSelect1" name="bidang_study">
                                                        <optgroup label="Bidang Lama">
                                                            <option value="{{$data->relasi_bidang_study ? $data->relasi_bidang_study->id : ''}}"> {{$data->relasi_bidang_study ? $data->relasi_bidang_study->kode_mapel : ''}}</option>
                                                        </optgroup>  
                                                        <optgroup label="Bidang Baru">  
                                                            @foreach ($bidang_study as $item)
                                                                <option value="{{$item->id}}">{{$item->kode_mapel}}</option>
                                                            @endforeach
                                                        </optgroup>
                                                    </select>                 
                                                </div>
                                            </div>
                                            <div class="col">
                                                <label>Walas Kelas</label>
                                                <div id="bloodhound">
                                                    <select class="form-control p-2" id="exampleFormControlSelect1" name="walas_kelas">
                                                        <optgroup label="Kelas Lama">
                                                            <option value="{{$data->relasi_walas_kelas ? $data->relasi_walas_kelas->id : ''}}">{{$data->relasi_walas_kelas ? $data->relasi_walas_kelas->nama_kelas : ''}}</option>
                                                        </optgroup>  
                                                        <optgroup label="Kelas Baru">  
                                                            @foreach ($walas_kelas as $item)
                                                                <option value="{{$item->id}}">{{$item->nama_kelas}}</option>
                                                            @endforeach
                                                        </optgroup>
                                                        <optgroup label="Tidak Menjadi Walas">
                                                            <option value="">Pengajar Biasa</option>
                                                        </optgroup>
                                                    </select>
                                                    @if ($message = Session::get('error_walas'))
                                                        <strong style="color:red;">{{ $message }}</strong>
                                                    @endif
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
                                    <div class="col-md-4 ">
                                        <div class="form-group row">                      
                                            <div class="col-md-12">
                                                <label>Jenis Kelamin <span style="color:red;"> *</span></label>
                                                <select class="form-control" name="jenis_kelamin" required>
                                                    <optgroup label="Gender Lama">
                                                        <option  value="{{$data->jenis_kelamin}}">
                                                            @if ($data->jenis_kelamin == 'laki-laki')
                                                                <span>Laki-laki</span>
                                                            @elseif($data->jenis_kelamin == 'perempuan')
                                                                <span>Perempuan</span>    
                                                            @endif
                                                        </option>
                                                    </optgroup>  
                                                    <optgroup label="Gender Baru">  
                                                        <option value="laki-laki">Laki-laki</option>
                                                        <option value="perempuan">Perempuan</option>
                                                    </optgroup>
                                                </select>
                                                <span class="text-danger">{{ $errors->first('jenis_kelamin') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Agama <span style="color:red;"> *</span></label>
                                            <select class="form-control" name="agama" placeholder="" required>
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
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">No Telpon</label>
                                            <input type="text" name="no_telpon_guru" class="form-control" id="exampleInputEmail1"  placeholder="No Telpon" value="{{$data->no_telpon_guru}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email Guru</label>
                                            <input type="email" name="email_guru" class="form-control" id="exampleInputEmail1"  placeholder="Email Guru" value="{{$data->email_guru}}">
                                        </div>
                                    </div>  
                                    <div class="col-md-4">
                                        <div class="form-group">                      
                                            <label for="exampleInputEmail1">Foto Guru</label>
                                            
                                            <div>
                                                @if($data->foto_guru)
                                                    <img src="{{url('/storage/foto_guru/'.$data->foto_guru)}}"
                                                    width="70px">
                                                @endif
                                                <input type="file" name="foto_guru" class="form-control" id="exampleInputEmail1"  placeholder="Foto Guru" value="{{$data->foto_guru}}" >
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <br>
                                <br>

                                <div class="d-md-flex align-items-center mb-4">
                                    <h5 class="card-title mb-md-0">Update Username & Password</h5>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Username</label>                                    
                                            
                                                <input id="name" type="text" class="form-control" name="username" value="{{$data->username}}" required autocomplete="off" minlength="0" maxlength="10" placeholder="(Panjang Maximal 10 Digit)" pattern="[a-zA-Z0-9]+" oninvalid="this.setCustomValidity('Input Khusus Huruf & Angka Tidak Boleh Menggunakan SPASI, Segera Refrest Halaman Ini !!!')">
                                                <span class="text-danger">{{ $errors->first('username') }}</span>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">                      
                                                <label for="exampleInputEmail1">Status User <span style="color:red;"> *</span></label>                                    
                                                
                                                    <select class="form-control" name="status_user" placeholder="status" required>
                                                        <optgroup label="Status Lama">
                                                            <option  value="{{$data->status_user}}">
                                                                @if ($data->status_user == 'active')
                                                                    <span>Aktif</span>
                                                                @elseif($data->status_user == 'not_active')
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
                                            <label class="" for="exampleInputEmail1">Password</label>
                                        
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

                                <a href="{{route('teacher.index')}}" class="btn btn-outline-warning btn-sm"><i class="far fa-arrow-alt-circle-left pr-2"></i>Kembali</a>
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