<div class="p-2">
    <div id="wizard1">
        <h5 style="color:black;">Kehadiran Bulanan Kelas 10</h5>
        <section>
            <div class="row row-sm mg-t-20">
                @foreach ($kelas_10 as $kls10)
                    @if ($kls10->tingkat_kelas == "X (10)")
                        <div class="col-sm-6 col-lg-4">
                            <div class="card shadow-base bd-0">
                            <div class="card-header bg-primary d-flex justify-content-between align-items-center" >
                                <h6 class="card-title tx-uppercase tx-12 mg-b-0" style="color: white">{{$kls10->jurusan_kelas}}</h6>
                                <span class="tx-15 tx-uppercase" style="color: black">{{date('M Y')}}
                                    @if ($results = $data_absent->where('kelas_siswa', '=', $kls10->id)->where('bln_dwin', '=', $bln)->where('thn_dwin', '=', $thn)->first())
                                        <i data-toggle="tooltip" data-placement="top" title="Sudah Import Absent" class="fas fa-calendar-check pl-1" style="color: #08c61e"></i>
                                    @else
                                        <i data-toggle="tooltip" data-placement="top" title="Belum Import Absent" class="fas fa-times-circle pl-1" style="color: #F49917"></i>
                                    @endif

                                </span>
                            </div><!-- card-header -->
                            <div class="card-body d-xs-flex justify-content-between align-items-center">
                                <h4 class="mg-b-0 tx-inverse tx-lato tx-bold">{{$kls10->nama_kelas}}</h4>
                                <a href="{{route('kehadiran-bulanan-siswa', $kls10->id)}}">
                                    <p class="mg-b-0 tx-sm"><span class="tx-success">Selengkap-nya <i class="fa fa-arrow-right"></i></span></p>
                                </a>
                            </div><!-- card-body -->
                            </div><!-- card -->
                        </br>
                        </div><!-- col-4 -->
                    @endif
                @endforeach
            </div><!-- row -->
        </section>
        <h5 style="color:black;">Kehadiran Bulanan Kelas 11</h5>
        <section>
            <div class="row row-sm mg-t-20">
                @foreach ($kelas_11 as $kls11)
                    @if ($kls11->tingkat_kelas == 'XI (11)')
                        <div class="col-sm-6 col-lg-4">
                            <div class="card shadow-base bd-0">
                            <div class="card-header bg-indigo d-flex justify-content-between align-items-center">
                                <h6 class="card-title tx-uppercase tx-12 mg-b-0" style="color: white">{{$kls11->jurusan_kelas}}</h6>
                                <span class="tx-15 tx-uppercase" style="color: black;">{{date('M Y')}}
                                    @if ($results = $data_absent->where('kelas_siswa', '=', $kls11->id)->where('bln_dwin', '=', $bln)->where('thn_dwin', '=', $thn)->first())
                                        <i data-toggle="tooltip" data-placement="top" title="Sudah Import Absent" class="fas fa-calendar-check pl-1" style="color: #08c61e"></i>
                                    @else
                                        <i data-toggle="tooltip" data-placement="top" title="Belum Import Absent" class="fas fa-times-circle pl-1" style="color: #F49917"></i>
                                    @endif
                                </span>
                            </div><!-- card-header -->
                            <div class="card-body d-xs-flex justify-content-between align-items-center">
                                <h4 class="mg-b-0 tx-inverse tx-lato tx-bold">{{$kls11->nama_kelas}}</h4>
                                <a href="{{route('kehadiran-bulanan-siswa', $kls11->id)}}">
                                    <p class="mg-b-0 tx-sm"><span class="tx-success">Selengkap-nya <i class="fa fa-arrow-right"></i></span></p>
                                </a>
                            </div><!-- card-body -->
                            </div><!-- card -->
                        </br>
                        </div><!-- col-4 -->
                    @endif
                @endforeach
            </div><!-- row -->
        </section>
        <h5 style="color:black;">Kehadiran Bulanan Kelas 12</h5>
        <section>
            <div class="row row-sm mg-t-20">
                @foreach ($kelas_12 as $kls12)
                    @if ($kls12->tingkat_kelas == "XII (12)")
                            
                        <div class="col-sm-6 col-lg-4">
                            <div class="card shadow-base bd-0">
                            <div class="card-header bg-purple d-flex justify-content-between align-items-center">
                                <h6 class="card-title tx-uppercase tx-12 mg-b-0" style="color: white">{{$kls12->jurusan_kelas}}</h6>
                                <span class="tx-15 tx-uppercase" style="color: black">{{date('M Y')}}
                                    @if ($results = $data_absent->where('kelas_siswa', '=', $kls12->id)->where('bln_dwin', '=', $bln)->where('thn_dwin', '=', $thn)->first())
                                        <i data-toggle="tooltip" data-placement="top" title="Sudah Import Absent" class="fas fa-calendar-check pl-1" style="color: #08c61e"></i>
                                    @else
                                        <i data-toggle="tooltip" data-placement="top" title="Belum Import Absent" class="fas fa-times-circle pl-1" style="color: #F49917"></i>
                                    @endif
                                </span>
                            </div><!-- card-header -->
                            <div class="card-body d-xs-flex justify-content-between align-items-center">
                                <h4 class="mg-b-0 tx-inverse tx-lato tx-bold">{{$kls12->nama_kelas}}</h4>
                                <a href="{{route('kehadiran-bulanan-siswa', $kls12->id)}}">
                                    <p class="mg-b-0 tx-sm"><span class="tx-success">Selengkap-nya <i class="fa fa-arrow-right"></i></span></p>
                                </a>
                            </div><!-- card-body -->
                            </div><!-- card -->
                        </br> 
                        </div><!-- col-4 -->
                    @endif
                @endforeach
            </div><!-- row -->
        </section>
    </div>
</div>




