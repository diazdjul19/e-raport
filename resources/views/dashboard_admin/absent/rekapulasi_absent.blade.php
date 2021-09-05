@extends('layouts.master_admin_e-raport')
    
@section('br-mainpanel')

    {{-- br-header --}}
    <div class="br-pageheader">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('home')}}">E-Raport</a>
            <a class="breadcrumb-item" href="#">Data Kehadiran Siswa</a>
            <span class="breadcrumb-item active">Rekapulasi Absent</span>
        </nav>
    </div><!-- br-pageheader -->

    {{-- br-title --}}
    <div class="br-pagetitle">
        <i class="fas fa-hourglass-half" style="font-size:65px;color:#000;"></i>
        <div>
            <h4>Rekapulai Absent</h4>
            <p class="mg-b-0">Aplikasi E-Raport Berbasis Web SMKN 4 Kota Bekasi.</p>
        </div>
    </div>
    <div class="br-pagebody pd-x-20 pd-sm-x-30" id="" >
        <div class="accordion" id="accordionExample">
            <div class="card">
                <div class="card-header bg-light" id="headingOne">
                    <div class="row">
                        <div class="col-md-6">
                            <button class="btn btn-link text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="color: black;">
                                <h5 class="mb-0">
                                    <i class="far fa-plus-square pr-1" style="color: #0866C6;"></i> <span>Search In Option</span>
                                </h5>
                            </button>
                            
                        </div>
                    </div>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body mt-3">
                        <div class="row justify-content-center">
                            <div class="col-12 grid-margin">                
                                    <form class="form-sample" action="{{route('buka-rekapulasi-absent')}}" method="get">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-2 ">
                                                <div class="form-group row">                      
                                                    <div class="col-md-12">
                                                        <label style="color: black;font-weight:bold;">Absent Kelas :</label>
                                                        <select class="form-control" id="select-search" name="kelas_siswa">
                                                            <option value="" disabled selected>Pilih Kelas</option>
                                                            @foreach ($get_kelas_siswa as $item)
                                                                <option value="{{$item->id}}">{{$item->nama_kelas}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                            </div>


                                            <div class="col-md-5 ">
                                                <div class="form-group row">                      
                                                    <div class="col-md-12">
                                                        <label style="color: black;font-weight:bold;">Rentang Bulan :</label>
                                                        <div class="input-group">
                                                            <input type="month"  name="dari_bln" class="form-control" id="" placeholder="" required autocomplete="off">
                                                            <div class="input-group-append">
                                                                <div class="input-group-text">-</div>
                                                            </div>
                                                            <input type="month"  name="sampai_bln" class="date-picker-month form-control" id="" placeholder="" required autocomplete="off">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                        
                                            <div class="col-md-3 ">
                                                <div class="form-group row">                      
                                                    <div class="col-md-12">
                                                        <label style="color: black;font-weight:bold;">Semester :</label>
                                                        <select class="form-control" id="" name="semester">
                                                            {{-- <optgroup label="Semester Active">
                                                                <option value="{{$get_semester_active[0]->semester}}">
                                                                    @if ($get_semester_active[0]->semester == "ganjil")
                                                                        Semester Satu (Ganjil)
                                                                    @elseif ($get_semester_active[0]->semester == "genap")
                                                                        Semester Dua (Genap)
                                                                    @endif
                                                                </option>
                                                            </optgroup> --}}

                                                            <optgroup label="Pilih Semester">
                                                                <option value="ganjil">Semester Satu (Ganjil)</option>
                                                                <option value="genap">Semester Dua (Genap)</option>
                                                            </optgroup>
                                                        
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-2 ">
                                                <div class="form-group row">                      
                                                    <div class="col-md-12">
                                                        <label style="color: black;font-weight:bold;">Th.Pelajaran :</label>
                                                        <select class="form-control" id="" name="th_pelajaran">
                                                            {{-- <optgroup label="Thn.Pelajaran Active">
                                                                <option value="{{$get_semester_active[0]->tahun_ajaran}}">{{$get_semester_active[0]->tahun_ajaran}}</option>
                                                            </optgroup> --}}

                                                            <optgroup label="Pilih Thn.Pelajaran">
                                                                @foreach ($get_th_pelajaran as $item)
                                                                    <option value="{{$item->tahun_ajaran}}">{{$item->tahun_ajaran}}</option>
                                                                @endforeach
                                                            </optgroup>
                                                        
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <a href="{{route('rekapitulasi-absent')}}" class="btn btn-outline-warning btn-sm"><i class="fas fa-sync-alt pr-2"></i>Refresh</a>
                                        <button type="submit" class="btn btn-outline-primary btn-sm"><i class="fas fa-save pr-2"></i>Buka Absent</button>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    
    @if (isset($data))
        <div class="br-pagebody">
            <div class="br-section-wrapper">
                <div class="d-sm-flex align-items-center mb-4">
                    
                    <div class="mg-t-20 mg-lg-t-0">
                        Action Rekapulasi Absent Siswa
                    </div><!-- col-4 -->

                    
                    <a href="{{route("excel-rekapulasi-absent")}}?{{ $data_url }}" class="btn btn-outline-success ml-auto mb-3 mb-sm-0 mt-1 btn-sm">
                        <span><i class="fas fa-file-excel pr-2"></i>Download Excel</span>
                    </a>

                    <a href="{{route("pdf-rekapulasi-absent")}}?{{ $data_url }}" class="btn btn-outline-danger ml-1 mb-3 mb-sm-0 mt-1 btn-sm">
                        <span><i class="fas fa-file-pdf pr-2"></i>Download PDF</span>
                    </a>


                </div>
                <hr>
                <hr>
                <div class="table-wrapper table-responsive-md">
                    <table id="table_id" class="table text-center" border="1" >
                        <thead style="background-color: #d6d6d6;">
                            <tr>
                                <th style="vertical-align: middle;" rowspan="2">No</th>
                                <th style="vertical-align: middle;" class="text-left" rowspan="2">Nama Siswa</th>
                                <th style="vertical-align: middle;" rowspan="2">NISN</th>
                                <th style="vertical-align: middle;" rowspan="2">Kelas</th>
                                <th style="vertical-align: middle;" colspan="4">
                                    Data Absensi 
                                    <br>
                                    Dari <span class="badge badge-success" style="font-size:12px;">{{date('d F Y', strtotime($dari_bln))}}</span>
                                    Sampai <span class="badge badge-danger" style="font-size:12px;">{{date('d F Y', strtotime($sampai_bln))}}</span>
                                </th>
                                <th style="vertical-align: middle;" rowspan="2">Koleksi</th>
                            </tr>
                            <tr>
                                <th class="" style="background-color: lightgreen;">Sakit</th>
                                <th class="" style="background-color: yellow;">Izin</th>
                                <th class="" style="background-color: red;">Alfa</th>
                                <th class="" style="background-color: #0866C6; color:white;">Jml</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td class="text-left">{{$item->nama_siswa}}</td>
                                    <td>{{$item->nis_siswa}}</td>
                                    <td>{{$kelas->nama_kelas}}</td>
                                    <td style="background-color: #ccf9cc; color:black;">{{$item->sakit}}</td>
                                    <td style="background-color: #ffff8c; color:black;">{{$item->izin}}</td>
                                    <td style="background-color: #ff9e9e; color:black;">{{$item->alpa}}</td>
                                    <td style="background-color: #BFF5F6; color:black; font-weight:bold;">{{$item->sakit + $item->izin + $item->alpa}}</td>
                                    <td><a href="">Lihat Detail</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    
                    </table>


                </div>
            </div>
        </div> 
    @endif
    
@endsection


@push('footer-admin')
    <script>
        $(document).ready( function () {
            // DataTable Biasa
            $('#table_id').DataTable({
                responsive: true,
                language: {
                    searchPlaceholder: 'Search...',
                    sSearch: '',
                    lengthMenu: '_MENU_ items/page',
                }
            });
        } );
    </script>


    {{-- <script>
        $(document).ready(function(){
            $(function() {
                $('.date-picker-month').datepicker({
                    changeMonth: true,
                    changeYear: true,
                    showButtonPanel: true,
                    dateFormat: 'MM',
                    onClose: function(dateText, inst) { 
                        var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
                        var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                        $(this).datepicker('setDate', new Date(year, month, 1));
                    }
                });
                $(".date-picker-month").focus(function () {
                    $(".ui-datepicker-year").hide();
                    $(".ui-datepicker-calendar").hide();
                    
                });
            });

            $(function() {
                $('.date-picker-year').datepicker({
                    changeYear: true,
                    showButtonPanel: true,
                    dateFormat: 'yy',
                    onClose: function(dateText, inst) { 
                        var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                        $(this).datepicker('setDate', new Date(year, 1));
                    }
                });
                $(".date-picker-year").focus(function () {
                    $(".ui-datepicker-month").hide();
                    $(".ui-datepicker-calendar").hide();

                });
            });
        });
    </script> --}}

    


    {{-- GUA JADI HARUS CUSTOM CSS, CUMA BUAT SATU OPTION DOANG hixxx  --}}
    <link href="/bracket-master/app/lib/select2/css/custom.css" rel="stylesheet">
    <script src="/bracket-master/app/lib/select2/js/custom.js"></script>

    <script>
        $(document).ready(function () {
        //change selectboxes to selectize mode to be searchable
        $("#select-search").select2();
            
        });
    </script>
@endpush



