@extends('layouts.master_admin_e-raport')

@section('br-mainpanel')
    {{-- br-header --}}
    <div class="br-pageheader">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('home')}}">E-Raport</a>
            <a class="breadcrumb-item" href="#">Management Guru</a>
            <a class="breadcrumb-item" href="{{route('teacher.index')}}">Management Guru</a>
            <span class="breadcrumb-item active">Detail Guru</span>
        </nav>
    </div><!-- br-pageheader -->

    {{-- br-title --}}
    <div class="br-pagetitle">
        <i class="fas fa-info-circle" style="font-size:65px;color:#000;"></i>
        <div>
            <h4>Detail Guru</h4>
            <p class="mg-b-0">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        </div>
    </div>

    {{-- br-body --}}
    <div class="br-pagebody">
        <div class="br-section-wrapper">
                <div class="d-md-flex align-items-center mb-4">
                    <a href="{{route('teacher.index')}}" style="font-size:20px; margin-right:10px; text-decoration:none;" href="">
                        <i class="far fa-arrow-alt-circle-left mt-2" style="font-size:20px;"></i>
                    </a>
                    <h5 class="card-title mb-md-0">Kembali</h5>
                </div>
                
            <div class="row justify-content-center">                
                <div class="col-sm-4">
                    <table class="table w-100">
                        <tr>
                            <th>Nama Guru</th>
                            <td>{{$data->nama_guru}}</td>
                        </tr>
                        <tr>
                            <th>Jabatan Fungsional</th>
                            <td>{{$data->jabatan_fungsional}}</td>
                        </tr>
                        <tr>
                            <th>Bidang Study</th>
                            <td>{{$data->relasi_bidang_study ? $data->relasi_bidang_study->kode_mapel : '-'}}</td>
                        </tr>
                        <tr>
                            <th>Agama</th>
                            <td>{{$data->agama}}</td>
                        </tr>
                        <tr>
                            <th>Waktu Create</th>
                            <td>{{date('H:i - d M Y', strtotime($data->created_at))}}</td>
                        </tr>
                        <br>
                        <tr>
                            <th>Username</th>
                            <td>{{$data->username}}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-sm-4">
                    <table class="table w-100">
                        <tr>
                            <th>NIP</th>
                            <td>{{$data->nip}}</td>
                        </tr>
                        <tr>
                            <th>Tipe Guru</th>
                            <td>
                                @if ($data->jenis_guru == "produktif")
                                    <span class="badge badge-primary" style="font-size:12px;">PRODUKTIF</span> 
                                @elseif($data->jenis_guru == "not_produktif")
                                    <span class="badge badge-warning" style="font-size:12px;">NOT PRODUKTIF</span> 
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>TTL</th>
                            <td>{{$data->tempat_lahir}}, {{date('d M Y', strtotime($data->tanggal_lahir))}}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{$data->email_guru}}</td>
                        </tr>
                        <tr>
                            <th>Waktu Update</th>
                            <td>{{date('H:i - d M Y', strtotime($data->updated_at))}}</td>
                        </tr>
                        <br>
                        <tr>
                            <th>Password</th>
                            <td>
                                @if ($data->password == 'guru123')
                                    {{$data->password}}
                                @elseif($data->password != 'guru123')
                                    <i class="fas fa-exchange-alt" data-toggle="tooltip" data-placement="top" title="Password Sudah Di Ubah"></i>
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-sm-4">
                    <table class="table w-100">
                        <tr>
                            <th>NUPTK</th>
                            <td>{{$data->nuptk}}</td>
                        </tr>
                        <tr>
                            <th>Walas Kelas</th>
                            <td>{{$data->relasi_walas_kelas ? $data->relasi_walas_kelas->nama_kelas : '-'}}</td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin</th>
                            <td>
                                @if ($data->jenis_kelamin == 'laki-laki')
                                    <span class="badge badge-dark" style="font-size:12px;">Laki - Laki</span> 
                                @elseif($data->jenis_kelamin == 'perempuan')
                                    <span class="badge badge-light" style="font-size:12px;">Perempuan</span> 
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>No Telpon</th>
                            <td>{{$data->no_telpon_guru}}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                @if ($data->status_user == 'active')
                                    <span class="badge badge-success" style="font-size:12px;">Active</span> 
                                @elseif($data->status_user == 'not_active')
                                    <span class="badge badge-danger" style="font-size:12px;">Not Active</span> 
                                @endif
                            </td>
                        </tr>
                        <br>
                        <tr>
                            <th>Foto Guru</th>
                            <td><img class="" style="width:120px;" src="{{url('/storage/foto_guru/'.$data->foto_guru)}}"></td>
                        </tr>
                    </table>
                </div>
            </div>
            
        </div>
    </div>
@endsection