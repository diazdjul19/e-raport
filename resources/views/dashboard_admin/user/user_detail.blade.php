@extends('layouts.master_admin_e-raport')

@section('br-mainpanel')
    {{-- br-header --}}
    <div class="br-pageheader">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('home')}}">E-Raport</a>
            <a class="breadcrumb-item" href="#">Management User</a>
            <a class="breadcrumb-item" href="{{route('user.index')}}">Management User</a>
            <span class="breadcrumb-item active">Detail User</span>
        </nav>
    </div><!-- br-pageheader -->

    {{-- br-title --}}
    <div class="br-pagetitle">
        <i class="fas fa-info-circle" style="font-size:65px;color:#000;"></i>
        <div>
            <h4>Detail User</h4>
            <p class="mg-b-0">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        </div>
    </div>

    {{-- br-body --}}
    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <div class="d-md-flex align-items-center mb-4">
                    <a href="{{route('user.index')}}" style="font-size:25px; margin-right:10px; text-decoration:none;" href="">
                        <i class="far fa-arrow-alt-circle-left mt-2" style="font-size:30px;"></i>
                    </a>
                    <h3 class="card-title mb-md-0">Table Detail User</h3>
                </div>
                <br>
            <div class="row justify-content-center">                
                <div class="col-sm-6">
                    <table class="table w-100">
                        <tr>
                            <th>Nama User</th>
                            <td>{{$data->name}}</td>
                        </tr>
                        <tr>
                            <th>Email User</th>
                            <td>{{$data->email}}</td>
                        </tr>
                        <tr>
                            <th>Nomer HP</th>
                            <td>{{$data->no_hp}}</td>
                        </tr>
                        <tr>
                            <th>Tempat, Tanggal Lahir</th>
                            <td>{{$data->tempat_lahir}}, {{date('d M Y', strtotime($data->tanggal_lahir))}}</td>
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
                        
                    </table>
                </div>
                <div class="col-sm-6">
                    <table class="table w-100">
                        
                        <tr>
                            <th>Level User</th>
                            <td>
                                @if ($data->level == 'A')
                                    <span class="badge badge-primary" style="font-size:12px;">Admin</span> 
                                @elseif($data->level == 'O')
                                    <span class="badge badge-info" style="font-size:12px;">Operator</span> 
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Tanggal & Waktu Register</th>
                            <td>{{date('d M Y  - H:i:s', strtotime($data->created_at))}}</td>
                        </tr>
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
                            <th>Foto Anggota</th>
                            @if ($data->foto_user == true)
                                {{-- GET IMAGE FROM STORAGE LARAVEL --}}
                                {{-- <td><img class="" style="width:120px;" src="{{url('/storage/user/'.$data->foto_user)}}"></td> --}}

                                {{-- GET IMAGE FROM STORAGE CLOUDINARY --}}
                                <td><img class="" style="width:120px;" src="{{$data->foto_user}}"></td>
                            @else
                                <td><img style="width: 50px; height:50px;border-radius:50%;" src="/folder-pendukung/user-polos.png"></td>
                            @endif
                            

                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection