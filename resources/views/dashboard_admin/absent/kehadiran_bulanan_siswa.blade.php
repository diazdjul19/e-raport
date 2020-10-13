@extends('layouts.master_admin_e-raport')

@section('br-mainpanel')
    {{-- br-header --}}
    <div class="br-pageheader">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('home')}}">E-Raport</a>
            <a class="breadcrumb-item" href="#">Data Kehadiran Siswa</a>
            <span class="breadcrumb-item active">Kehadiran Bulanan Siswa</span>
        </nav>
    </div><!-- br-pageheader -->

    {{-- br-title --}}
    <div class="br-pagetitle">
        <i class="fa fa-tasks" style="font-size:65px;color:#000;"></i>
        <div>
            <h4>Kehadiran Bulanan Siswa</h4>
            <p class="mg-b-0">Aplikasi E-Raport Berbasis Web SMKN 4 Kota Bekasi.</p>
        </div>

        
        <div class="col-sm-4 mb-3 ml-auto mb-3 mb-sm-0 mt-1 btn-sm" >
            <div class="input-group">
                    <input type="search" name="" id="" class="form-control" placeholder="Search  ...">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
                    </div>
                </div><!-- input-group -->
        </div><!-- col-4 -->
        
    </div>


    <div class="br-pagebody pd-x-20 pd-sm-x-30" >
        
        <div class="p-2" style="">
            <div id="wizard1">
                <h4>Kehadiran Bulanan Kelas 10</h4>
                <section>
                    <div class="row row-sm mg-t-20">
                        @foreach ($kelas_10 as $kls10)
                            <div class="col-sm-6 col-lg-4">
                                <br>
                                <div class="card shadow-base bd-0">
                                <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
                                    <h6 class="card-title tx-uppercase tx-12 mg-b-0">{{$kls10->jurusan_kelas}}</h6>
                                    <span class="tx-15 tx-uppercase">{{date('M Y')}}
                                        <i data-toggle="tooltip" data-placement="top" title="Belum Import Absent" class="far fa-times-circle pl-1" style="color: #F49917"></i>
                                        {{-- <i data-toggle="tooltip" data-placement="top" title="SUdah Import Absent" class="far fa-calendar-check pl-1" style="color: #0866C6"></i> --}}
                                    </span>
                                </div><!-- card-header -->
                                <div class="card-body d-xs-flex justify-content-between align-items-center">
                                    <h4 class="mg-b-0 tx-inverse tx-lato tx-bold">{{$kls10->nama_kelas}}</h4>
                                    <a href="">
                                        <p class="mg-b-0 tx-sm"><span class="tx-success">Selengkap-nya <i class="fa fa-arrow-right"></i></span></p>
                                    </a>
                                </div><!-- card-body -->
                                </div><!-- card -->
                            </div><!-- col-4 -->
                        @endforeach
                    </div><!-- row -->
                </section>
                <h4>Kehadiran Bulanan Kelas 11</h4>
                <section>
                    <div class="row row-sm mg-t-20">
                        @foreach ($kelas_11 as $kls11)
                            <div class="col-sm-6 col-lg-4">
                                <br>
                                <div class="card shadow-base bd-0">
                                <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
                                    <h6 class="card-title tx-uppercase tx-12 mg-b-0">{{$kls11->jurusan_kelas}}</h6>
                                    <span class="tx-15 tx-uppercase">{{date('M Y')}}
                                        <i data-toggle="tooltip" data-placement="top" title="Belum Import Absent" class="far fa-times-circle pl-1" style="color: #F49917"></i>
                                        {{-- <i data-toggle="tooltip" data-placement="top" title="SUdah Import Absent" class="far fa-calendar-check pl-1" style="color: #0866C6"></i> --}}
                                    </span>
                                </div><!-- card-header -->
                                <div class="card-body d-xs-flex justify-content-between align-items-center">
                                    <h4 class="mg-b-0 tx-inverse tx-lato tx-bold">{{$kls11->nama_kelas}}</h4>
                                    <a href="">
                                        <p class="mg-b-0 tx-sm"><span class="tx-success">Selengkap-nya <i class="fa fa-arrow-right"></i></span></p>
                                    </a>
                                </div><!-- card-body -->
                                </div><!-- card -->
                            </div><!-- col-4 -->
                        @endforeach
                    </div><!-- row -->
                </section>
                <h4>Kehadiran Bulanan Kelas 12</h4>
                <section>
                    <div class="row row-sm mg-t-20">
                        @foreach ($kelas_12 as $kls12)
                            <div class="col-sm-6 col-lg-4">
                                <br>
                                <div class="card shadow-base bd-0">
                                <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
                                    <h6 class="card-title tx-uppercase tx-12 mg-b-0">{{$kls12->jurusan_kelas}}</h6>
                                    <span class="tx-15 tx-uppercase">{{date('M Y')}}
                                        <i data-toggle="tooltip" data-placement="top" title="Belum Import Absent" class="far fa-times-circle pl-1" style="color: #F49917"></i>
                                        {{-- <i data-toggle="tooltip" data-placement="top" title="SUdah Import Absent" class="far fa-calendar-check pl-1" style="color: #0866C6"></i> --}}
                                    </span>
                                </div><!-- card-header -->
                                <div class="card-body d-xs-flex justify-content-between align-items-center">
                                    <h4 class="mg-b-0 tx-inverse tx-lato tx-bold">{{$kls12->nama_kelas}}</h4>
                                    <a href="">
                                        <p class="mg-b-0 tx-sm"><span class="tx-success">Selengkap-nya <i class="fa fa-arrow-right"></i></span></p>
                                    </a>
                                </div><!-- card-body -->
                                </div><!-- card -->
                            </div><!-- col-4 -->
                        @endforeach
                    </div><!-- row -->
                </section>
            </div>
        </div>

    </div>

    <br>

@endsection



@push('footer-admin')
    <script>
        $(document).ready(function() {
            'use strict';
            $('#wizard1').steps({
                headerTag: 'h4',
                bodyTag: 'section',
                autoFocus: true,
                titleTemplate: '<span class="number">#index#</span> <span class="title">#title#</span>'
                
            });
        });
    </script>

    <script>
        // Untuk Membuat Tooltip
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
@endpush
