@extends('layouts.master_admin_e-raport')
    
@section('br-mainpanel')

    {{-- br-header --}}
    <div class="br-pageheader">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('home')}}">E-Raport</a>
            <a class="breadcrumb-item" href="#">Data Kehadiran Siswa</a>
            <a class="breadcrumb-item" href="{{route('kehadiran-bulanan-kelas-siswa')}}">Kehadiran Bulanan Siswa</a>
            <span class="breadcrumb-item active">Data Kehadiran Kelas {{$data->nama_kelas}}</span>
        </nav>
    </div><!-- br-pageheader -->

    {{-- br-title --}}
    <div class="br-pagetitle">
        <i class="fa fa-tasks" style="font-size:65px;color:#000;"></i>
        <div>
            <h4>Data Kehadiran Kelas {{$data->nama_kelas}}</h4>
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


                        @if ($results = $data_absent->where('kelas_siswa', '=', $data->id)->where('bln_dwin', '=', $bln)->where('thn_dwin', '=', $thn)->first())
                            
                        @else
                            <div class="col-md-6">
                                <button type="button" class="btn btn-outline-success mt-2 mb-2 float-right mr-3 btn-sm" style="" data-toggle="modal" data-target="#ImporttDataSiswa">
                                    <span><i class="fas fa-file-upload pr-1"></i>Import Data Absent Siswa</span>  
                                </button>

                                
                                <button type="button" class="btn btn-outline-success mt-2 mb-2 float-right mr-3  btn-sm" data-toggle="modal" data-target="#DownloadFormatExcel">
                                    <span><i class="fas fa-file-download pr-1"></i>Download Format Excel</span>  
                                </button>
                            </div>
                        @endif

                        

                    </div>

                    
                    
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body mt-3">
                        <div class="row justify-content-center">
                            <div class="col-12 grid-margin">                
                                    <form class="form-sample" action="{{route('buka-absent-siswa')}}" method="get">
                                        @csrf
                                        <div class="row">
                                            
                                            <div class="col-md-3 ">
                                                <div class="form-group row">                      
                                                    <div class="col-md-12">
                                                        <label style="color: black;font-weight:bold;">Buka Absent Kelas :</label>
                                                        <select class="form-control" id="" name="kelas_siswa">
                                                            <optgroup label="Buka Absent Kelas">
                                                                <option value="{{$data->id}}">{{$data->nama_kelas}}</option>
                                                            </optgroup>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-2 ">
                                                <div class="form-group row">                      
                                                    <div class="col-md-12">
                                                        <label style="color: black;font-weight:bold;">Pilih Bulan :</label>
                                                        <input type="text" readonly name="bln_dwin" class="date-picker-month form-control" id=""  placeholder="" autocomplete="off" >
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-2 ">
                                                <div class="form-group row">                      
                                                    <div class="col-md-12">
                                                        <label style="color: black;font-weight:bold;">Pilih Tahun :</label>
                                                        <input type="text" readonly name="thn_dwin" class="date-picker-year form-control" id=""  placeholder="" autocomplete="off" >
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3 ">
                                                <div class="form-group row">                      
                                                    <div class="col-md-12">
                                                        <label style="color: black;font-weight:bold;">Semester :</label>
                                                        <select class="form-control" id="" name="semester">
                                                            <optgroup label="Semester Active">
                                                                <option value="{{$get_semester_active->semester}}">
                                                                    @if ($get_semester_active->semester == "ganjil")
                                                                        Semester Satu (Ganjil)
                                                                    @elseif ($get_semester_active->semester == "genap")
                                                                        Semester Dua (Genap)
                                                                    @endif
                                                                </option>
                                                            </optgroup>

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
                                                            <optgroup label="Thn.Pelajaran Active">
                                                                <option value="{{$get_semester_active->tahun_ajaran}}">{{$get_semester_active->tahun_ajaran}}</option>
                                                            </optgroup>

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


                                        <a href="{{route('kehadiran-bulanan-kelas-siswa')}}" class="btn btn-outline-warning btn-sm"><i class="far fa-arrow-alt-circle-left pr-2"></i>Kembali</a>
                                        <button type="submit" class="btn btn-outline-primary btn-sm"><i class="fas fa-save pr-2"></i>Buka Absent</button>

                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Download Format Excel -->
            <div class="modal fade" id="DownloadFormatExcel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Download Format Excel</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12 text-center">

                                    <span>SILAHKAN KLIK BUTTON DI BAWAH</span>
                                    <br>
                                    <br>
                                    <a href="{{route('download-format-excel-kehadiran-bulanan', $data->id)}}" class="btn btn-primary btn-sm">
                                        <span><i class="fas fa-file-download pr-2"></i>Download Format Import</span>
                                    </a>

                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                </div>
            </div>

        <!-- Modal Import Data Siswa -->
            <div class="modal fade" id="ImporttDataSiswa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Import Data Absent Siswa</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        
                        <form action="{{route('import-kehadiran-bulanan')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12 text-center">

                                        <input type="file" name="file_import_absent" id="file_import_absent" class="inputfile" data-multiple-caption="{count} files selected" multiple>
                                        <label for="file_import_absent" class="tx-white bg-info">
                                            <i class="icon ion-ios-upload-outline tx-24"></i>
                                            <span>Choose a file...</span>
                                        </label>


                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-outline-primary btn-sm">Import</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>

    @if (isset($search))
        <div class="br-pagebody">
            <div class="br-section-wrapper">
                <div class="d-sm-flex align-items-center mb-4">
                    
                    <div class="mg-t-20 mg-lg-t-0">
                        Action Kehadiran Bulanan Siswa
                    </div><!-- col-4 -->

                    
                    <a href="{{route("excel-kehadiran-bulanan-siswa")}}?{{ $data_url }}" class="btn btn-outline-success ml-auto mb-3 mb-sm-0 mt-1 btn-sm">
                        <span><i class="fas fa-file-excel pr-2"></i>Download Excel</span>
                    </a>

                    <a href="{{route("pdf-kehadiran-bulanan-siswa")}}?{{ $data_url }}" class="btn btn-outline-danger ml-1 mb-3 mb-sm-0 mt-1 btn-sm">
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
                                <th style="vertical-align: middle;" colspan="3">
                                    Ketidakhadiran
                                    Bulan <span class="badge badge-primary" style="font-size:12px;">{{$bln_dwin}} </span>
                                    Thn <span class="badge badge-primary" style="font-size:12px;">{{$thn_dwin}} </span>
                                </th>
                                <th style="background-color: #0866C6; color:white; vertical-align: middle;" rowspan="2">Jumlah</th>
                            </tr>
                            <tr>
                                <th style="background-color: lightgreen;">Sakit</th>
                                <th style="background-color: yellow;">Izin</th>
                                <th style="background-color: red;">Alfa</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($search as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td class="text-left">{{$item->nama_siswa}}</td>
                                    <td>{{$item->nis_siswa}}</td>
                                    <td>{{$data->nama_kelas}}</td>
                                    <td style="background-color: #ccf9cc; color:black;">{{$item->jml_sakit_bln}}</td>
                                    <td style="background-color: #ffff8c; color:black;">{{$item->jml_izin_bln}}</td>
                                    <td style="background-color: #ff9e9e; color:black;">{{$item->jml_alpa_bln}}</td>
                                    <td style="background-color: #BFF5F6; color:black; font-weight:bold;">{{$item->jml_sakit_bln + $item->jml_izin_bln + $item->jml_alpa_bln}}</td>
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

    <script>
        // Cuma Untuk Input Tyle File Saja
        $(function(){

            'use strict';

            $( '.inputfile' ).each( function()
            {
            var $input	 = $( this ),
                $label	 = $input.next( 'label' ),
                labelVal = $label.html();

            $input.on( 'change', function( e )
            {
                var fileName = '';

                if( this.files && this.files.length > 1 )
                fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
                else if( e.target.value )
                fileName = e.target.value.split( '\\' ).pop();

                if( fileName )
                $label.find( 'span' ).html( fileName );
                else
                $label.html( labelVal );
            });

            // Firefox bug fix
            $input
            .on( 'focus', function(){ $input.addClass( 'has-focus' ); })
            .on( 'blur', function(){ $input.removeClass( 'has-focus' ); });
            });

        });
    </script>


    <script>
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
        
    </script>
@endpush



