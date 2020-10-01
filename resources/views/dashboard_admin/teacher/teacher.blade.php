@extends('layouts.master_admin_e-raport')

@section('br-mainpanel')
    {{-- br-header --}}
    <div class="br-pageheader">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('home')}}">E-Raport</a>
            <a class="breadcrumb-item" href="#">Management Guru</a>
            <span class="breadcrumb-item active">Management Guru</span>
        </nav>
    </div><!-- br-pageheader -->

    {{-- br-title --}}
    <div class="br-pagetitle">
        <i class="fas fa-chalkboard-teacher" style="font-size:65px;color:#000;"></i>
        <div>
            <h4>Management Guru</h4>
            <p class="mg-b-0">Aplikasi E-Raport Berbasis Web SMKN 4 Kota Bekasi.</p>
        </div>
    </div>

    {{-- br-body --}}
    <div class="br-pagebody">

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

        @if ($message = Session::get('error_nip'))
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
        @endif

        @if ($message = Session::get('error_walas'))
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
        @endif
        <div class="br-section-wrapper">
            <div class="d-sm-flex align-items-center mb-4">
                    
                <div class="mg-t-20 mg-lg-t-0">
                    Action Management Teacher
                </div><!-- col-4 -->


                <a href="{{route('teacher.create')}}" class="btn btn-outline-primary ml-auto mb-3 mb-sm-0 mt-1 btn-sm">
                    <span><i class="fas fa-plus-circle pr-2"></i>Tambah</span>
                </a>

            </div>
            
            <hr>
            <hr>
            <br>

            <form action="{{'select-delete-teacher'}}" method="post" >
                @csrf
                <div class="table-wrapper table-responsive">
                    <table id="table_id" class="table display responsive nowrap" >
                        <thead class="thead-colored thead-indigo">
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Nama Guru</th>
                                <th class="text-center">NIP</th>
                                <th class="text-center">Walas</th>
                                <th class="text-center" style="font-size: 9px;">Username / Password Default</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                                
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
                                    <td class="text-center">{{$d->nama_guru}} <br></td>
                                    <td class="text-center">{{$d->nip}}</td>
                                    <td class="text-center">{{$d->relasi_walas_kelas ? $d->relasi_walas_kelas->nama_kelas : '-'}}</td>
                                    <td class="text-center" style="font-weight: bold; color:black;">
                                        @if ($d->password == 'guru123')
                                            {{$d->username}} / {{$d->password}}
                                        @elseif($d->password != 'guru123')
                                            {{$d->username}} / <i class="fas fa-exchange-alt" data-toggle="tooltip" data-placement="top" title="Password Sudah Di Ubah"></i>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($d->status_user == 'not_active')
                                            <a class="btn-sm btn btn-outline-warning" id="active-button" href="{{route('teacher.active', $d->id)}}"  data-toggle="tooltip" data-placement="right" title="Status Guru Belum Aktif"><i class="fa fa-clock"></i></a>
                                        @elseif($d->status_user == 'active')
                                            <a class="btn-sm btn btn-outline-success" id="non-active-button" href="{{route('teacher.not-active', $d->id)}}"  data-toggle="tooltip" data-placement="right" title="Status Guru Sudah Aktif"><i class="fa fa-user-check" ></i></a>
                                        
                                        @endif 
                                    </td>
                                    <td class="text-center">
                                        <a href="{{route('teacher.edit', $d->id)}}" class="btn-sm btn btn-outline-success"div><i class="icon ion-compose mr-1"></i>Edit</div></a>
                                        <a href="{{route('teacher.show', $d->id)}}" class="btn-sm btn btn-outline-purple"div><i class="fas fa-info-circle mr-1"></i>Detail</div></a>
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
        

        // // Start Confirm Active User Using SweetAlert2
            $('#active-button').on('click',function(e){
                e.preventDefault();
                const url = $(this).attr('href');
                // var id = $(this).data('id');
                Swal.fire({
                    title: 'Apakah Anda Yakin?',
                    text: "Anda akan mengaktifkan guru ini!",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, active it!'
                }).then((result) => {
                    if (result.value) {
                        Swal.fire(
                            'Success!',
                            'Guru Berhasil Di Aktifkan.',
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
                    text: "Anda akan menonaktifkan guru ini!",
                    icon: 'error',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, non active it!'
                }).then((result) => {
                    if (result.value) {
                        Swal.fire(
                        'Success!',
                        'Guru Berhasil Di Non-Aktifkan .',
                        'success'
                        )
                        window.location.href = url;
                    }
                });
                
            });
        // // End Confirm Non Active User Using SweetAlert2
        
    </script>




@endpush
