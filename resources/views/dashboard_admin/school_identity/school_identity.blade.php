@extends('layouts.master_admin_e-raport')
@section('br-mainpanel')
    {{-- br-header --}}
    <div class="br-pageheader">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('home')}}">E-Raport</a>
            <span class="breadcrumb-item active">Identitas Sekolah</span>
        </nav>
    </div><!-- br-pageheader -->

    {{-- br-title --}}
    <div class="br-pagetitle">
        <i class="fas fa-school" style="font-size:65px;color:#000;"></i>
        <div>
            <h4>Management Identitas Sekolah</h4>
            <p class="mg-b-0">Aplikasi E-Raport Berbasis Web SMKN 4 Kota Bekasi.</p>
        </div>
    </div>

    {{-- br-body --}}
    <div class="br-pagebody">

        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-bordered pd-y-20" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                <div class="d-sm-flex align-items-center justify-content-start">
                <i class="icon ion-ios-checkmark alert-icon tx-52 mg-r-20 tx-success"></i>
                <div class="mg-t-20 mg-sm-t-0">
                    <h5 class="mg-b-2 tx-success">Success Publish</h5>
                    <p class="mg-b-0 tx-gray">{{$message}}</p>
                </div>
                </div><!-- d-flex -->
            </div><!-- alert -->
        @endif

        <div class="br-section-wrapper">
            <div class="row justify-content-center">
                <div class="col-12 grid-margin">
                        <div class="d-md-flex align-items-center mb-4">
                            <a href="{{route('home')}}" style="font-size:25px; margin-right:10px; text-decoration:none;">
                                <i class="far fa-arrow-alt-circle-left mt-2" style="font-size:30px;"></i>
                            </a>
                            <h4 class="card-title mb-md-0">Management Identitas Sekolah</h4>
                        </div>
                        
                        @if ($data_id == null)
                            {{-- Tambah Isentitas Sekolah --}}
                            <form class="form-sample" action="{{route('school-identity.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama Sekolah <span style="color:red;"> *</span></label>
                                            <input type="text" name="nama_sekolah" class="form-control" id="exampleInputEmail1"  placeholder="Nama Sekolah" required>
                                            <input type="hidden" name="random_string" value="{{$random_string}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">NPSN Sekolah <span style="color:red;"> *</span></label>
                                            <input type="number" min="0" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57" name="NPSN" class="form-control" id="exampleInputEmail1"  placeholder="No NPSN" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">No Telpon Sekolah <span style="color:red;"> *</span></label>
                                            <input type="number" min="0" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57" name="no_telpon_sekolah" class="form-control" id="exampleInputEmail1"  placeholder="No Telpon Sekolah" required>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email Sekolah <span style="color:red;"> *</span></label>
                                            <input type="email" name="email_sekolah" class="form-control" id="exampleInputEmail1"  placeholder="example@gmail.com" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Website Resmi Sekolah <span style="color:red;"> *</span></label>
                                            <input type="text" name="website_resmi_sekolah" class="form-control" id="exampleInputEmail1"  placeholder="www.websekolah.com" required>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Logo Sekolah</label>
                                            <input type="file" name="logo_sekolah" class="form-control" id="exampleInputEmail1">
                                        </div>
                                    </div>
                                </div>

                                <br>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Alamat Sekolah <span style="color:red;"> *</span></label>
                                            <input type="text" name="alamat_sekolah" class="form-control" id="exampleInputEmail1"  placeholder="Alamat Sekolah" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Kelurahan <span style="color:red;"> *</span></label>
                                            <input type="text" name="kelurahan" class="form-control" id="exampleInputEmail1"  placeholder="Kelurahan" required>

                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Kecamatan <span style="color:red;"> *</span></label>
                                            <input type="text" name="kecamatan" class="form-control" id="exampleInputEmail1"  placeholder="Kecamatan" required>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Kota / Kabupaten <span style="color:red;"> *</span></label>
                                            <input type="text" name="kota_kabupaten" class="form-control" id="exampleInputEmail1"  placeholder="Kota / Kabupaten" required>

                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Provinsi <span style="color:red;"> *</span></label>
                                            <input type="text" name="provinsi" class="form-control" id="exampleInputEmail1"  placeholder="Provinsi" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">IFRAME Sekolah<span></label>
                                            <input type="text" name="iframe_sekolah" class="form-control" id="exampleInputEmail1"  placeholder="Set Iframe Sekolah (Ukuran Ideal Width: 100%, Height: 450px)"  value="">
                                        </div>
                                    </div>
                                </div>



                                <button type="submit" class="btn btn-primary btn-with-icon mt-3">
                                    <div class="ht-40">
                                        <span class="icon wd-30"><i class="fas fa-save" style="font-size:20px;"></i></span>
                                        <span class="pd-x-15">Simpan Data</span>
                                    </div>
                                </button>
                            </form>

                        @elseif($data_id != null)
                            {{-- Edit Identitas Sekolah --}}
                            <form class="form-sample" action="{{route('school-identity.update', $data_edit->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                {{method_field('put')}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama Sekolah <span style="color:red;"> *</span></label>
                                            <input type="text" name="nama_sekolah" class="form-control" id="exampleInputEmail1"  placeholder="Nama Sekolah" required  value="{{$data_edit->nama_sekolah}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">NPSN Sekolah <span style="color:red;"> *</span></label>
                                            <input type="number" min="0" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57" name="NPSN" class="form-control" id="exampleInputEmail1"  placeholder="No NPSN" required value="{{$data_edit->NPSN}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">No Telpon Sekolah <span style="color:red;"> *</span></label>
                                            <input type="number" min="0" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57"  name="no_telpon_sekolah" class="form-control" id="exampleInputEmail1"  placeholder="No Telpon Sekolah" required value="{{$data_edit->no_telpon_sekolah}}">

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email Sekolah <span style="color:red;"> *</span></label>
                                            <input type="email" name="email_sekolah" class="form-control" id="exampleInputEmail1"  placeholder="example@gmail.com" required value="{{$data_edit->email_sekolah}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Website Resmi Sekolah <span style="color:red;"> *</span></label>
                                            <input type="text" name="website_resmi_sekolah" class="form-control" id="exampleInputEmail1"  placeholder="www.websekolah.com" required value="{{$data_edit->website_resmi_sekolah}}">

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Logo Sekolah</label> <br>
                                            @if($data_edit->logo_sekolah == true)
                                                {{-- GET IMAGE FROM STORAGE LARAVEL --}}
                                                {{-- <img src="{{url('/storage/logo_sekolah/'.$data_edit->logo_sekolah)}}" width="120px"> --}}

                                                {{-- GET IMAGE FROM STORAGE CLOUDINARY --}}
                                                <img src="{{$data_edit->logo_sekolah}}" width="120px">

                                            @endif
                                            <input type="file" name="logo_sekolah" class="form-control" id="exampleInputEmail1">
                                        </div>
                                    </div>
                                </div>

                                <br>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Alamat Sekolah <span style="color:red;"> *</span></label>
                                            <input type="text" name="alamat_sekolah" class="form-control" id="exampleInputEmail1"  placeholder="Alamat Sekolah" required value="{{$data_edit->alamat_sekolah}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Kelurahan <span style="color:red;"> *</span></label>
                                            <input type="text" name="kelurahan" class="form-control" id="exampleInputEmail1"  placeholder="Kelurahan" required value="{{$data_edit->kelurahan}}">

                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Kecamatan <span style="color:red;"> *</span></label>
                                            <input type="text" name="kecamatan" class="form-control" id="exampleInputEmail1"  placeholder="Kecamatan" required value="{{$data_edit->kecamatan}}">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Kota / Kabupaten <span style="color:red;"> *</span></label>
                                            <input type="text" name="kota_kabupaten" class="form-control" id="exampleInputEmail1"  placeholder="Kota / Kabupaten" required value="{{$data_edit->kota_kabupaten}}">

                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Provinsi <span style="color:red;"> *</span></label>
                                            <input type="text" name="provinsi" class="form-control" id="exampleInputEmail1"  placeholder="Provinsi" required value="{{$data_edit->provinsi}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">IFRAME Sekolah<span></label>
                                            <input type="text" name="iframe_sekolah" class="form-control" id="exampleInputEmail1"  placeholder="Set Iframe Sekolah (Ukuran Ideal Width: 100%, Height: 450px)"  value="{{$data_edit->iframe_sekolah}}">
                                        </div>
                                    </div>
                                </div>



                                <button type="submit" class="btn btn-primary btn-with-icon mt-3">
                                    <div class="ht-40">
                                        <span class="icon wd-30"><i class="fas fa-save" style="font-size:20px;"></i></span>
                                        <span class="pd-x-15">Simpan Data</span>
                                    </div>
                                </button>
                            </form>
                        @endif
                        
                </div>
            </div>
        </div>
    </div>

    
@endsection

