@extends('layouts.master_admin_e-raport')

@section('br-mainpanel')
    {{-- br-header --}}
    <div class="br-pageheader">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('home')}}">E-Raport</a>
            <a class="breadcrumb-item" href="#">Management Siswa</a>
            <span class="breadcrumb-item active">Management Siswa Kelas 12</span>
        </nav>
    </div><!-- br-pageheader -->

    {{-- br-title --}}
    <div class="br-pagetitle">
        <i class="fas fa-users" style="font-size:65px;color:#000;"></i>
        <div>
            <h4>Management Siswa Kelas 12</h4>
            <p class="mg-b-0">Aplikasi E-Raport Berbasis Web SMKN 4 Kota Bekasi.</p>
        </div>
    </div>


    <div class="br-pagebody pd-x-20 pd-sm-x-30">
        <div class="row row-sm mg-t-20">

            @foreach ($kelas_12 as $kls12)
                <div class="col-sm-6 col-lg-4">
                    <br>
                    <div class="card shadow-base bd-0">
                    <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
                        <h6 class="card-title tx-uppercase tx-12 mg-b-0">{{$kls12->jurusan_kelas}}</h6>
                        <span class="tx-12 tx-uppercase">{{date('D, d M Y')}}</span>
                    </div><!-- card-header -->
                    <div class="card-body">
                        <h4 class="tx-sm tx-inverse tx-medium mg-b-1">{{$kls12->nama_kelas}}</h4>
                        <p class="tx-12"><span class="tx-primary">Tingkat : {{$kls12->tingkat_kelas}}</span> - <span class="tx-danger">Max : {{$kls12->max_siswa}} Siswa</span> </p>

                        <a href="{{route('management-students-kelas-12-table', $kls12->id)}}">
                            <p class="tx-13 mg-b-0 mg-t-15"><span class="tx-success">Selengkap-nya <i class="fa fa-arrow-right"></i></span></p>
                        </a>
                    </div><!-- card-body -->
                    </div><!-- card -->
                </div><!-- col-4 -->
            @endforeach
        </div>
    </div>


    
    

@endsection
