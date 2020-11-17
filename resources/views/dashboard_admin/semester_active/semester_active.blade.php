@extends('layouts.master_admin_e-raport')

@section('br-mainpanel')
    {{-- br-header --}}
    <div class="br-pageheader">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('home')}}">E-Raport</a>
            <span class="breadcrumb-item active">Semester Aktif</span>
        </nav>
    </div><!-- br-pageheader -->


    {{-- br-title --}}
    <div class="br-pagetitle">
        <i class="far fa-calendar-alt" style="font-size:65px;color:#000;"></i>
        <div>
            <h4>Semester Aktif</h4>
            <p class="mg-b-0">Aplikasi E-Raport Berbasis Web SMKN 4 Kota Bekasi.</p>
        </div>
    </div>
    {{-- br-body --}}
    <div class="br-pagebody">

        <div class="br-section-wrapper">
            
        <div class="d-sm-flex align-items-center mb-4">
            <div class="mg-t-20 mg-lg-t-0">
                Action Semester Aktif
            </div><!-- col-4 -->

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-outline-primary ml-auto mb-3 mb-sm-0 mt-1 btn-sm" data-toggle="modal" data-target="#exampleModal" style="border-radius:8%;">
                <span><i class="fas fa-plus-circle pr-2"></i>Tambah</span>
            </button>
        </div>

        

        <!-- Start Create Model -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Set Semester</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <form action="{{route('semester-active.store')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row" style="margin:0px;">
                                    <label class="col-md-4 col-form-label" for="nama_kepsek_cr"><h6 style="color: black;">Nama Kepsek</h6></label>
                                    <div class="col-md-8">
                                        <input type="text" name="nama_kepsek" class="form-control" id="nama_kepsek_cr" placeholder=""  style="height:30px;" required >
                                    </div>
                                    <span class="text-danger">{{ $errors->first('nama_kepsek') }}</span>
                                </div>

                                <div class="form-group row" style="margin:0px;">
                                    <label class="col-md-4 col-form-label" for="nip_kepsek_cr"><h6 style="color: black;">NIP Kepsek</h6></label>
                                    <div class="col-md-8">
                                        <input type="atribut" min="0" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57" name="nip_kepsek" class="form-control" id="nip_kepsek_cr" placeholder=""  style="height:30px;" >
                                    </div>
                                </div>

                                <div class="form-group row" style="margin:0px;">
                                    <label class="col-md-4 col-form-label" for="semester_cr"><h6 style="color: black;">Semester</h6></label>                                   
                                    <div class="col-md-8">
                                        <select class="form-control pt-0 pb-0" name="semester" id="semester_cr" style="height:30px;" required>
                                            <option value="disabled" disabled selected>Pilih Semester</option>
                                            <option value="ganjil">Semester Satu (Ganjil)</option>
                                            <option value="genap">Semester Dua (Genap)</option>
                                        </select>
                                        <span class="text-danger">{{ $errors->first('semester') }}</span>
                                    </div>
                                </div>

                                <div class="form-group row" style="margin:0px;">
                                    <label class="col-md-4 col-form-label" for="pts_pas_cr"><h6 style="color: black;">PTS / PAS</h6></label>                                   
                                    <div class="col-md-8">
                                        <select class="form-control pt-0 pb-0" name="pts_pas" id="pts_pas_cr" style="height:30px;" required>
                                            <option value="disabled" disabled selected>PTS / PAS</option>
                                            <option value="PTS">Penilaian Tengan Semester (PTS)</option>
                                            <option value="PAS">Penilaian Akhir Semester (PAS)</option>
                                        </select>
                                        <span class="text-danger">{{ $errors->first('pts_pas') }}</span>
                                    </div>
                                </div>

                                <div class="form-group row" style="margin:0px;">
                                    <label class="col-md-4 col-form-label" for="tahun_ajaran_cr"><h6 style="color: black;">Tahun Ajaran</h6></label>
                                    <div class="col-md-8">
                                        <div class="input-group">
                                            <input type="text"  name="tahun_ajaran_dari" class="date-picker-year form-control" id="" placeholder=""  style="height:30px;" required autocomplete="off">
                                            <div class="input-group-append">
                                                <div class="input-group-text" style="height: 30px;">/</div>
                                            </div>
                                            <input type="text"  name="tahun_ajaran_sampai" class="date-picker-year form-control" id="" placeholder=""  style="height:30px;" required autocomplete="off">
                                        </div>
                                    </div>
                                    <span class="text-danger">{{ $errors->first('tahun_ajaran') }}</span>

                                </div>
                                
                                <div class="form-group row" style="margin:0px;">
                                    <label class="col-md-4 col-form-label" for="dari_tanggal_cr"><h6 style="color: black;">Dari Tangal</h6></label>
                                    <div class="col-md-8">
                                        <input type="date" name="dari_tanggal" class="form-control" id="dari_tanggal_cr" placeholder=""  style="height:30px;" required >
                                    </div>
                                    <span class="text-danger">{{ $errors->first('dari_tanggal') }}</span>

                                </div>

                                <div class="form-group row" style="margin:0px;">
                                    <label class="col-md-4 col-form-label" for="sampai_tanggal_cr"><h6 style="color: black;">Sampai Tanggal</h6></label>
                                    <div class="col-md-8">
                                        <input type="date" name="sampai_tanggal" class="form-control" id="sampai_tanggal_cr" placeholder=""  style="height:30px;" required >
                                    </div>
                                    <span class="text-danger">{{ $errors->first('sampai_tanggal') }}</span>

                                </div>

                                <div class="form-group row" style="margin:0px;">
                                    <label class="col-md-4 col-form-label" for="tgl_pembagian_raport_cr"><h6 style="color: black;">Tgl Bagi Raport</h6></label>
                                    <div class="col-md-8">
                                        <input type="date" name="tgl_pembagian_raport" class="form-control" id="tgl_pembagian_raport_cr" placeholder=""  style="height:30px;" required >
                                    </div>
                                    <span class="text-danger">{{ $errors->first('tgl_pembagian_raport') }}</span>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-outline-primary btn-sm">Simpan</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
        {{-- End Create MOdel --}}

        
        <hr>
        <hr>
        <br>

        <div class="table-wrapper table-responsive-md">
            <table id="table_id" class="table display responsive" >
                <thead class="thead-colored thead-primary">
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Kepala Sekolah</th>
                        <th class="text-center">Semester</th>
                        <th class="text-center">Thn Ajaran</th>
                        <th class="text-center">Dari Tgl - Sampai Tgl</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $d)
                        <tr>
                            <td class="text-center pt-2">{{$loop->iteration}}</td>
                            <td class="text-center pt-2">{{$d->nama_kepsek}} <br> {{$d->nip_kepsek ? $d->nip_kepsek : '-'}}</td>
                            <td class="text-center pt-2">
                                @if ($d->semester == "ganjil")
                                    Semester Satu (Ganjil)
                                @elseif ($d->semester == "genap")
                                    Semester Dua (Genap)
                                @endif
                                <br> 
                                @if ($d->pts_pas == "PTS")
                                    <span class="badge badge-secondary" style="font-size:12px;" data-toggle="tooltip" data-placement="bottom" title="Penilaian Tengan Semester">
                                        PTS
                                    </span>
                                @elseif ($d->pts_pas == "PAS")
                                    <span class="badge badge-dark" style="font-size:12px;" data-toggle="tooltip" data-placement="bottom" title="Penilaian Akhir Semester">
                                        PAS
                                    </span>
                                @endif                                
                            </td>
                            <td class="text-center pt-2">
                                <span class="badge badge-light" style="font-size:12px;">{{$d->tahun_ajaran}}</span>
                            </td>
                            <td class="text-center pt-2">
                                <span class="badge badge-success" style="font-size:12px;">
                                    {{date('d M Y', strtotime($d->dari_tanggal))}}
                                </span>
                                -
                                <span class="badge badge-danger" style="font-size:12px;">
                                    {{date('d M Y', strtotime($d->sampai_tanggal))}}
                                </span>
                                <br>
                                <span class="badge badge-primary" style="font-size:12px;" data-toggle="tooltip" data-placement="bottom" title="Tanggal Pembagian Raport">
                                    {{date('d M Y', strtotime($d->tgl_pembagian_raport))}}
                                </span>
                            </td>
                            <td class="text-center">
                                @if ($dt >= $d->sampai_tanggal)
                                    <span class="badge badge-danger" style="font-size:12px;">Selesai</span>
                                @elseif ($dt >= $d->dari_tanggal)
                                    <span class="badge badge-success" style="font-size:12px;">Berlangsung</span>
                                @elseif($dt <= $d->dari_tanggal)
                                    <span class="badge badge-warning" style="font-size:12px;">Belum Mulai</span>
                                @endif
                            </td>

                            
                            <td class="text-center">
                                @if ($d->status == 'not_active')
                                    <a class="btn-sm btn btn-warning" id="active-button" href="{{route('semester-active.active', $d->id)}}"  data-toggle="tooltip" data-placement="right" title="Status Tidak Aktif"><i class="far fa-times-circle"></i></a>
                                @elseif($d->status == 'active')
                                    <a class="btn-sm btn btn-primary" id="non-active-button" href="{{route('semester-active.not-active', $d->id)}}"  data-toggle="tooltip" data-placement="right" title="Status Sudah Aktif"><i class="far fa-star" ></i></a>
                                @endif 

                                <a href="{{route('semester-active.edit', $d->id)}}" class="btn-sm btn btn-outline-success" ><div><i class="icon ion-compose"></i></div></a>
                                <a href="{{route('semester-active.destroy', $d->id)}}" class="btn-sm btn btn-outline-danger confirm-delete-button"><div><i class="icon ion-trash-b"></i></div></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
        </div>
    </div>

@endsection


@push('footer-admin')
    
    <script type="text/javascript">
        $(document).ready( function () {

            // Start DataTable Biasa
            var table = $('#table_id').DataTable({
                            responsive: true,
                            language: {
                                searchPlaceholder: 'Search...',
                                sSearch: '',
                                lengthMenu: '_MENU_ items/page',
                            }
                        });
            // End DataTable Biasa
        } );
    </script>


    {{-- LINK untuk sweetalert 2 sudah di taro di file master_admin_e-raport --}}
    <script>

        // // Start Confirm Active User Using SweetAlert2
            $('#active-button').on('click',function(e){
                e.preventDefault();
                const url = $(this).attr('href');
                // var id = $(this).data('id');
                Swal.fire({
                    title: 'Apakah Anda Yakin?',
                    text: "Anda akan mengaktifkan Semester ini!",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, active it!'
                }).then((result) => {
                    if (result.value) {
                        Swal.fire(
                            'Success!',
                            'Semester Berhasil Di Aktifkan.',
                            'success'
                        )
                        window.location.href = url;
                    }
                });
                
            });
        // // End Confirm Active User Using SweetAlert2


        // // Start Confirm Non Active User Using SweetAlert2
            $('#non-active-button').on('click',function(e){
                e.preventDefault();
                const url = $(this).attr('href');
                // var id = $(this).data('id');
                Swal.fire({
                    title: 'Apakah Anda Yakin?',
                    text: "Anda akan menonaktifkan Semester ini!",
                    icon: 'error',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, non active it!'
                }).then((result) => {
                    if (result.value) {
                        Swal.fire(
                        'Success!',
                        'Semester Berhasil Di Non-Aktifkan .',
                        'success'
                        )
                        window.location.href = url;
                    }
                });
                
            });
        // // End Confirm Non Active User Using SweetAlert2


        // Start Confirm delete Using SweetAlert2
            
            $('.confirm-delete-button').on('click',function(e){
                e.preventDefault();
                const url = $(this).attr('href');
                // var id = $(this).data('id');
                Swal.fire({
                    title: 'Apakah Anda Yakin?',
                    text: "Anda akan menghapus data ini!",
                    icon: 'error',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        Swal.fire(
                        'Success!',
                        'Data berhasil di hapus.',
                        'success'
                        )
                        window.location.href = url;
                    }
                });
                
            });

        // End Confirm delete Using SweetAlert2
        
    </script>


    <script>
        // Untuk Membuat Tooltip
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>



    <style>
        .ui-datepicker {
            z-index: 9999 !important;
        }
    </style>
    
    <script>
        $(function() {
                $('.date-picker-year').datepicker({
                    changeYear: true,
                    showButtonPanel: true,
                    dateFormat: 'yy',
                    onClose: function(dateText, inst) { 
                        var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                        $(this).datepicker('setDate', new Date(year, 1));
                    },
                });
                $(".date-picker-year").focus(function () {
                    $(".ui-datepicker-month").hide();
                    $(".ui-datepicker-calendar").hide();
                    
                });
                
            });
    </script>

@endpush
