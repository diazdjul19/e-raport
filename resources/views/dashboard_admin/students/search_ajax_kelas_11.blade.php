@if ($kelas_11 == true)
    @foreach ($kelas_11 as $kls11)
        @if ($kls11->tingkat_kelas == "XI (11)")
            <div class="col-sm-6 col-lg-4">
                <br>
                <div class="card shadow-base bd-0">
                <div class="card-header bg-indigo d-flex justify-content-between align-items-center">
                    <h6 class="card-title tx-uppercase tx-12 mg-b-0" style="color: white;">{{$kls11->jurusan_kelas}}</h6>
                    <span class="tx-12 tx-uppercase" style="color: black;">
                        <a href=""><i data-toggle="tooltip" data-placement="top" title="Go To Absent" class="fa fa-tasks pl-1" style="color: black; font-size:18px;"></i></a>      
                    </span>
                </div><!-- card-header -->
                <div class="card-body">
                    <h4 class="tx-sm tx-inverse tx-medium mg-b-1">{{$kls11->nama_kelas}}</h4>
                    <p class="tx-12"><span class="tx-primary">Tingkat : {{$kls11->tingkat_kelas}}</span> - <span class="tx-danger">Max : {{$kls11->max_siswa}} Siswa</span> </p>

                    <a href="{{route('management-students-kelas-11-table', $kls11->id)}}">
                        <p class="tx-13 mg-b-0 mg-t-15"><span class="tx-success">Selengkap-nya <i class="fa fa-arrow-right"></i></span></p>
                    </a>
                </div><!-- card-body -->
                </div><!-- card -->
            </div><!-- col-4 -->
        @endif
    @endforeach
@endif