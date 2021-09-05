@extends('layouts.master_admin_e-raport')

@section('br-mainpanel')
    {{-- br-header --}}
    <div class="br-pageheader">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('home')}}">E-Raport</a>
            <a class="breadcrumb-item" href="#">Management Siswa</a>

            @if (request()->is('management-detail-data-students-data-baru/*'))
                <a class="breadcrumb-item" href="{{route('management-data-baru')}}">Management Data Baru</a>
            @elseif(request()->is('management-detail-data-students-kelas-10/*'))
                <a class="breadcrumb-item" href="{{route('management-students-kelas-10')}}">Management Data Kelas 10</a>
                <a class="breadcrumb-item" href="{{route('management-students-kelas-10-table', $data->relasi_sekarang_kelas->id)}}">{{$data->relasi_sekarang_kelas->nama_kelas}}</a>
            @elseif(request()->is('management-detail-data-students-kelas-11/*'))
                <a class="breadcrumb-item" href="{{route('management-students-kelas-11')}}">Management Data Kelas 11</a>
                <a class="breadcrumb-item" href="{{route('management-students-kelas-11-table', $data->relasi_sekarang_kelas->id)}}">{{$data->relasi_sekarang_kelas->nama_kelas}}</a>
            @elseif(request()->is('management-detail-data-students-kelas-12/*'))
                <a class="breadcrumb-item" href="{{route('management-students-kelas-12')}}">Management Data Kelas 12</a>
                <a class="breadcrumb-item" href="{{route('management-students-kelas-12-table', $data->relasi_sekarang_kelas->id)}}">{{$data->relasi_sekarang_kelas->nama_kelas}}</a>
            @endif

            <span class="breadcrumb-item active">{{$data->nama_peserta_didik}}</span>
        </nav>
    </div><!-- br-pageheader -->

    {{-- br-title --}}
    <div class="br-pagetitle">
        <i class="fas fa-info-circle" style="font-size:65px;color:#000;"></i>
        <div>
            <h4>Detail Students</h4>
            <p class="mg-b-0">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        </div>
    </div>

    {{-- br-body --}}
    <div class="br-pagebody">
        <div class="br-section-wrapper">
                <div class="d-md-flex align-items-center mb-4">
                    @if (request()->is('management-detail-data-students-data-baru/*'))
                        <a href="{{route('management-data-baru')}}" style="font-size:20px; margin-right:10px; text-decoration:none;">
                            <i class="far fa-arrow-alt-circle-left mt-2" style="font-size:20px;"></i>
                        </a>
                    @elseif(request()->is('management-detail-data-students-kelas-10/*'))
                        <a href="{{route('management-students-kelas-10-table', $data->relasi_sekarang_kelas->id)}}" style="font-size:20px; margin-right:10px; text-decoration:none;">
                            <i class="far fa-arrow-alt-circle-left mt-2" style="font-size:20px;"></i>
                        </a>
                    @elseif(request()->is('management-detail-data-students-kelas-11/*'))
                        <a href="{{route('management-students-kelas-11-table', $data->relasi_sekarang_kelas->id)}}" style="font-size:20px; margin-right:10px; text-decoration:none;">
                            <i class="far fa-arrow-alt-circle-left mt-2" style="font-size:20px;"></i>
                        </a>
                    @elseif(request()->is('management-detail-data-students-kelas-12/*'))
                        <a href="{{route('management-students-kelas-12-table', $data->relasi_sekarang_kelas->id)}}" style="font-size:20px; margin-right:10px; text-decoration:none;">
                            <i class="far fa-arrow-alt-circle-left mt-2" style="font-size:20px;"></i>
                        </a>
                    @endif
                    <h5 class="card-title mb-md-0">Kembali</h5>
                </div>
            <br>
            <h6 style="font-weight: bold;color:black; font-style: italic;">DETAIL DATA SISWA</h6>
            <br>
            <div class="row justify-content-center">                
                <div class="col-sm-4">
                    <table class="table w-100">
                        <tr>
                            <th>Nama Siswa</th>
                            <td>{{$data->nama_peserta_didik}}</td>
                        </tr>
                        <tr>
                            <th>Nomor Induk</th>
                            <td>{{$data->nomor_induk}}</td>
                        </tr>
                        <tr>
                            <th>TTL</th>
                            <td>{{$data->tempat_lahir}}, {{date('d M Y', strtotime($data->tanggal_lahir))}}</td>
                        </tr>
                        <tr>
                            <th>No Telpon</th>
                            <td>{{$data->nomor_telpon_siswa}}</td>
                        </tr>
                        
                    </table>
                </div>
                <div class="col-sm-4">
                    <table class="table w-100">
                        <tr>
                            <th>NIS</th>
                            <td>{{$data->nis}}</td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin</th>
                            <td>
                                @if ($data->jk_siswa == 'L')
                                    <span class="badge badge-dark" style="font-size:12px;">Laki - Laki</span> 
                                @elseif($data->jk_siswa == 'P')
                                    <span class="badge badge-light" style="font-size:12px;">Perempuan</span> 
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Set Dlm Kel</th>
                            <td>{{$data->set_dlm_kel}}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{$data->email_siswa}}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-sm-4">
                    <table class="table w-100">
                        <tr>
                            <th>NISN</th>
                            <td>{{$data->nisn}}</td>
                        </tr>
                        <tr>
                            <th>Agama</th>
                            <td>{{$data->agama}}</td>
                        </tr>
                        <tr>
                            <th>Anak Ke</th>
                            <td><b style="color: black;">{{$data->anak_ke}}</b> Dari <b style="color: black;">{{$data->dari_berapa_bersaudara}}</b> Bersaudara</td>
                        </tr>
                        <tr>
                            <th>Sekolah Asal</th>
                            <td>{{$data->sekolah_asal}}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row justify-content-center">                
                <div class="col-sm-8">
                    <table class="table w-100">
                        <tr>
                            <th>Alamat</th>
                            <td>{{$data->alamat_peserta_didik}}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-sm-4">
                    <table class="table w-100">
                        <tr>
                            <th>Foto Siswa</th>
                            <td>
                                @if($data->foto_siswa == null)
                                    <img src="/bracket-master/app/img/nopicture.png"width="70px">
                                @elseif($data->foto_siswa)
                                    {{-- GET IMAGE FROM STORAGE LARAVEL --}}
                                    {{-- <img src="{{url('/storage/foto_siswa/'.$data->foto_siswa)}}"width="70px"> --}}

                                    {{-- GET IMAGE FROM STORAGE CLOUDINARY --}}
                                    <img src="{{$data->foto_siswa}}"width="70px">
                                @endif 
                            </td>
                        </tr>
                    </table>
                </div>
            </div>


            @if ($data->sekarang_kelas != null)
                <h6 style="font-weight: bold;color:black; font-style: italic;">DETAIL DATA CHECKLIST</h6>
                <br>
                <div class="row justify-content-center">                
                    <div class="col-sm-4">
                        <table class="table w-100">
                            <tr>
                                <th>Di Terima Di Kelas</th>
                                <td>{{$data->relasi_di_terima_di_kelas->nama_kelas}}</td>
                            </tr>
                            
                        </table>
                    </div>
                    <div class="col-sm-4">
                        <table class="table w-100">
                            <tr>
                                <th>Di Terima Pada Tanggal</th>
                                <td>{{date('d M Y', strtotime($data->di_terima_pada_tanggal))}}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-sm-4">
                        <table class="table w-100">
                            <tr>
                                <th>Sekarang Kelas</th>
                                <td>{{$data->relasi_sekarang_kelas->nama_kelas}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            @elseif($data->di_terima_di_kelas == null)
                {{-- KOSONGKAN SAJA --}}
            @endif


            <br>
            <h6 style="font-weight: bold;color:black; font-style: italic;">DETAIL DATA ORANGTUA</h6>
            <br>
            <div class="row justify-content-center">                
                <div class="col-sm-6">
                    <table class="table w-100">
                        <tr>
                            <th>Nama Ayah</th>
                            <td>{{$data->nama_ayah}}</td>
                        </tr>
                        <tr>
                            <th>Pekerjaan Ayah</th>
                            <td>{{$data->pekerjaan_ayah}}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-sm-6">
                    <table class="table w-100">
                        <tr>
                            <th>Nama Ibu</th>
                            <td>{{$data->nama_ibu}}</td>
                        </tr>
                        <tr>
                            <th>Pekerjaan Ibu</th>
                            <td>{{$data->pekerjaan_ibu}}</td>
                        </tr>
                    </table>
                </div>
                
            </div>
            <div class="row justify-content-center">                
                <div class="col-sm-4">
                    <table class="table w-100">
                        <tr>
                            <th>No Telpon Rumah</th>
                            <td>{{$data->nomor_telpon_rumah}}</td>
                        </tr>
                        
                    </table>
                </div>
                <div class="col-sm-8">
                    <table class="table w-100">
                        <tr>
                            <th>Alamat</th>
                            <td>{{$data->alamat_orangtua}}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <br>
            <h6 style="font-weight: bold;color:black; font-style: italic;">DETAIL DATA WALI</h6>
            <br>
            <div class="row justify-content-center">                
                <div class="col-sm-4">
                    <table class="table w-100">
                        <tr>
                            <th>Nama Wali</th>
                            <td>{{$data->nama_wali}}</td>
                        </tr>
                        
                    </table>
                </div>
                <div class="col-sm-4">
                    <table class="table w-100">
                        <tr>
                            <th>Jenis Kelamin</th>
                            <td>
                                @if ($data->jk_wali == 'L')
                                    <span class="badge badge-dark" style="font-size:12px;">Laki - Laki</span> 
                                @elseif($data->jk_wali == 'P')
                                    <span class="badge badge-light" style="font-size:12px;">Perempuan</span> 
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-sm-4">
                    <table class="table w-100">
                        <tr>
                            <th>Pekerjaan Wali</th>
                            <td>{{$data->pekerjaan_wali}}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <br>
            <h6 style="font-weight: bold;color:black; font-style: italic;">DETAIL USERNAME & PASSWORD</h6>
            <br>
            <div class="row justify-content-center">                
                <div class="col-sm-6">
                    <table class="table w-100">
                        <tr>
                            <th>Status</th>
                            <td>
                                @if ($data->status == 'active')
                                    <span class="badge badge-success" style="font-size:12px;">Active</span> 
                                @elseif($data->status == 'not_active')
                                    <span class="badge badge-danger" style="font-size:12px;">Not Active</span> 
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Username</th>
                            <td>{{$data->username}}</td>
                        </tr>
                        
                    </table>
                </div>
                <div class="col-sm-6">
                    <table class="table w-100">
                        <tr>
                            <th>Terakhir Update</th>
                            <td>{{date('d M Y', strtotime($data->updated_at))}}</td>
                        </tr>
                        <tr>
                            <th>Password</th>
                            <td>
                                @if ($data->password == 'siswa123')
                                    {{$data->password}}
                                @elseif($data->password != 'siswa123')
                                    <i class="fas fa-exchange-alt" data-toggle="tooltip" data-placement="top" title="Password Sudah Di Ubah"></i>
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
                
            </div>
        </div>
    </div>
@endsection