@extends('layouts.master_admin_e-raport')

@section('br-mainpanel')
    {{-- br-header --}}
    <div class="br-pageheader">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('home')}}">E-Raport</a>
            <a class="breadcrumb-item" href="#">Management Siswa</a>
            <span class="breadcrumb-item active">Management Data Baru</span>
        </nav>
    </div><!-- br-pageheader -->

    {{-- br-title --}}
    <div class="br-pagetitle">
        <i class="fas fa-users" style="font-size:65px;color:#000;"></i>
        <div>
            <h4>Management Data Baru</h4>
            <p class="mg-b-0">Aplikasi E-Raport Berbasis Web SMKN 4 Kota Bekasi.</p>
        </div>
    </div>

    {{-- br-body --}}
    <div class="br-pagebody">

        {{-- Success Alert --}}
        @if ($message = Session::get('success_create'))
            <div class="alert alert-success alert-bordered pd-y-20" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                <div class="d-sm-flex align-items-center justify-content-start">
                <i class="icon ion-ios-checkmark alert-icon tx-52 mg-r-20 tx-success"></i>
                <div class="mg-t-20 mg-sm-t-0">
                    <h5 class="mg-b-2 tx-success">Success : Data Baru Berhasil Di Tambahkan</h5>
                    <p class="mg-b-0 tx-gray">{{$message}}</p>
                </div>
                </div><!-- d-flex -->
            </div><!-- alert -->
        @endif
        
        {{-- Error Alert --}}
        {{-- @if ($message = Session::get(''))
            <div class="alert alert-danger alert-bordered pd-y-20" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                <div class="d-sm-flex align-items-center justify-content-start">
                <i class="icon ion-ios-close alert-icon tx-52 tx-danger mg-r-20"></i>
                <div class="mg-t-20 mg-sm-t-0">
                    <h5 class="mg-b-2 tx-danger">Gagal Menambahkan Data</h5>
                    <p class="mg-b-0 tx-gray">{{$message}}</p>
                </div>
                </div><!-- d-flex -->
            </div><!-- alert -->
        @endif --}}


        <div class="br-section-wrapper">
            <div class="d-sm-flex align-items-center mb-4">
                    
                <div class="mg-t-20 mg-lg-t-0">
                    Action Management Data Baru
                </div><!-- col-4 -->

                {{-- Download Format Metode Export --}}
                {{-- <a href="{{route('download-format-import-students')}}" class="btn btn-outline-success ml-auto mb-3 mb-sm-0 mt-1 btn-sm">
                    <span><i class="fas fa-file-download pr-2"></i>Download Format Import</span>
                </a> --}}

                {{-- Download Format Metode Ambil Dari Public --}}
                <a href="/folder-pendukung/Format-Import-Students.xlsx" class="btn btn-outline-success ml-auto mb-3 mb-sm-0 mt-1 btn-sm">
                    <span><i class="fas fa-file-download pr-2"></i>Download Format Import</span>
                </a>

                <button type="button" class="btn btn-outline-success ml-1 mb-3 mb-sm-0 mt-1 btn-sm" data-toggle="modal" data-target="#ImporttDataSiswa">
                    <span><i class="fas fa-file-upload pr-2"></i>Import Data Siswa</span>  
                </button>


                <a href="{{route('add-check-list-kelas-jurusan')}}" class="btn btn-outline-success ml-1 mr-4 mb-3 mb-sm-0 mt-1 btn-sm" data-toggle="tooltip" data-placement="top" title="Add Data Kelas & Jurusan">
                    <i class="fa fa-check-double"></i>
                </a>

                <a href="{{route('management-data-baru-create')}}" class="btn btn-outline-primary mb-3 mb-sm-0 mt-1 btn-sm">
                    <span><i class="fas fa-plus-circle pr-2"></i>Tambah</span>
                </a>

                
                {{-- <button class="btn btn-outline-danger ml-1 mb-3 mb-sm-0 mt-1 btn-sm" id="btn-co-delete" name="select_delete[]" type="submit"  data-toggle="tooltip" data-placement="top" title="Hapus Data">
                    <i class="icon ion-trash-b"></i>
                </button> --}}

            </div>
            
            <hr>
            <hr>
            <br>

            <!-- Modal Import Data Siswa -->
            <div class="modal fade" id="ImporttDataSiswa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Import Data Siswa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    
                    <form action="{{route('import-students')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12 text-center">

                                    <input type="file" name="file_import" id="file_import" class="inputfile" data-multiple-caption="{count} files selected" multiple>
                                    <label for="file_import" class="tx-white bg-info">
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

            <form action="select-delete-data-students" method="post" >
                @csrf
                <div class="table-wrapper table-responsive-sm">
                    <table id="table_id" class="table display responsive nowrap" >
                        <thead class="thead-colored thead-indigo">
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Nama Siswa</th>
                                <th class="text-center">NIS</th>
                                <th class="text-center">L/P</th>
                                <th class="text-center">Action</th>
                                <th class="text-center">Status</th>
                                
                                <th class="text-center">
                                    <div>
                                        <button class="btn btn-danger btn-icon" id="btn-co-delete" name="select_delete[]" type="submit"  data-toggle="tooltip" data-placement="top" title="Hapus Data">
                                            <i class="icon ion-trash-b p-2"></i>
                                        </button>
                                    </div>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($data as $d)
                                <tr>
                                    <td class="text-center">{{$loop->iteration}}</td>
                                    <td class="text-center">{{$d->nama_peserta_didik}} <br></td>
                                    <td class="text-center">{{$d->nis}}</td>
                                    <td class="text-center">
                                        @if ($d->jk_siswa == 'L')
                                            {{-- <span class="badge badge-primary" style="font-size:12px;">Laki - Laki</span>  --}}
                                            Laki - Laki
                                        @elseif($d->jk_siswa == 'P')
                                            {{-- <span class="badge badge-danger" style="font-size:12px;">Perempuan</span>  --}}
                                            Perempuan
                                        @elseif($d->jk_siswa == '-')
                                            -
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{route('management-edit-data-students-data-baru', $d->id)}}" class="btn-sm btn btn-outline-success"div><i class="icon ion-compose mr-1"></i>Edit</div></a>
                                        <a href="{{route('management-detail-data-students-data-baru', $d->id)}}" class="btn-sm btn btn-outline-purple"div><i class="fas fa-info-circle mr-1"></i>Detail</div></a>
                                    </td>
                                    <td class="text-center">
                                        @if ($d->status == 'not_active')
                                            <a class="btn-sm btn btn-outline-warning" id="active-button" href="{{route('management-students-set-active', $d->id)}}"  data-toggle="tooltip" data-placement="right" title="Status Guru Belum Aktif"><i class="fa fa-clock"></i></a>
                                        @elseif($d->status == 'active')
                                            <a class="btn-sm btn btn-outline-success" id="non-active-button" href="{{route('management-students-set-notactive', $d->id)}}"  data-toggle="tooltip" data-placement="right" title="Status Guru Sudah Aktif"><i class="fa fa-user-check" ></i></a>
                                        
                                        @endif 
                                    </td>
                                    <td class="text-center" style="padding-top: 1.5%;"><input type="checkbox" name="select_delete[]" value="{{$d->id}}"></td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </form>
            
            
        </div>
    </div>
    

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
        // Untuk Membuat Tooltip
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
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
@endpush


@push('btn-confirm')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    
    <script>
        // Start Confirm Select Delete Using SweetAlert2
            $('#btn-co-delete').on('click',function(e){
                e.preventDefault();

                var form = $(this).parents('form');
                Swal.fire({
                    title: 'Apakah Anda Yakin?',
                    text: "Anda tidak akan bisa mengembalikan data ini!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        Swal.fire(
                        'Success!',
                        'Data Berhasil Di Hapus.',
                        'success'
                        )
                        form.submit();
                    } else {
                        Swal.fire(
                            'Cancelled!',
                            'Our imaginary file is safe :).',
                            'error'
                        )
                    } 
                });
            });
        // End Confirm Select Delete Using SweetAlert2
        

        // Start Confirm Active User Using SweetAlert2
            $('#active-button').on('click',function(e){
                e.preventDefault();
                const url = $(this).attr('href');
                // var id = $(this).data('id');
                Swal.fire({
                    title: 'Apakah Anda Yakin?',
                    text: "Anda akan mengaktifkan siswa ini!",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, active it!'
                }).then((result) => {
                    if (result.value) {
                        Swal.fire(
                            'Success!',
                            'Siswa Berhasil Di Aktifkan.',
                            'success'
                        )
                        window.location.href = url;
                    }
                });
                
            });
        // End Confirm Active User Using SweetAlert2


        // Start Confirm Non Active User Using SweetAlert2
            $('#non-active-button').on('click',function(e){
                e.preventDefault();
                const url = $(this).attr('href');
                // var id = $(this).data('id');
                Swal.fire({
                    title: 'Apakah Anda Yakin?',
                    text: "Anda akan menonaktifkan siswa ini!",
                    icon: 'error',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, non active it!'
                }).then((result) => {
                    if (result.value) {
                        Swal.fire(
                        'Success!',
                        'Siswa Berhasil Di Non-Aktifkan .',
                        'success'
                        )
                        window.location.href = url;
                    }
                });
                
            });
        // End Confirm Non Active User Using SweetAlert2
        
    </script>

@endpush
