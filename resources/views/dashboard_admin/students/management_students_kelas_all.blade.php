@extends('layouts.master_admin_e-raport')

@section('br-mainpanel')
    {{-- br-header --}}
    <div class="br-pageheader">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('home')}}">E-Raport</a>
            <a class="breadcrumb-item" href="#">Management Siswa</a>

            @if ($data_kelas->tingkat_kelas == 'X (10)')
                <a class="breadcrumb-item" href="{{route('management-students-kelas-10')}}">Management Siswa Kelas 10</a>           
            @elseif ($data_kelas->tingkat_kelas == 'XI (11)')
                <a class="breadcrumb-item" href="{{route('management-students-kelas-11')}}">Management Siswa Kelas 11</a>           
            @elseif ($data_kelas->tingkat_kelas == 'XII (12)')
                <a class="breadcrumb-item" href="{{route('management-students-kelas-12')}}">Management Siswa Kelas 12</a>           
            @endif

            <span class="breadcrumb-item active">{{$data_kelas->nama_kelas}}</span>

        </nav>
    </div><!-- br-pageheader -->

    {{-- br-title --}}
    <div class="br-pagetitle">
        <i class="fas fa-users" style="font-size:65px;color:#000;"></i>
        <div>
            <h4>Management Siswa Kelas {{$data_kelas->nama_kelas}}</h4>
            <p class="mg-b-0">Aplikasi E-Raport Berbasis Web SMKN 4 Kota Bekasi.</p>
        </div>
    </div>

    {{-- br-body --}}
    <div class="br-pagebody">

        <form action="{{route('select-delete-data-students')}}" method="post" >
            @csrf
            <div class="br-section-wrapper">
                <div class="d-sm-flex align-items-center mb-4">
                        
                    <div class="mg-t-20 mg-lg-t-0">
                        Action Management Siswa Kelas <span style="font-weight: bold;">{{$data_kelas->nama_kelas}}</span>
                    </div><!-- col-4 -->

                    @if ($data_kelas->tingkat_kelas == 'X (10)')
                        <a href="{{route('edit-check-list-kelas-jurusan-kls10', $data_kelas->id)}}" class="btn btn-outline-success ml-auto mb-3 mb-sm-0 btn-sm" data-toggle="tooltip" data-placement="top" title="Edit Data Kelas & Jurusan">
                            <i class="fa fa-check-double"></i>
                        </a>
                    @elseif ($data_kelas->tingkat_kelas == 'XI (11)')
                        <a href="{{route('edit-check-list-kelas-jurusan-kls11', $data_kelas->id)}}" class="btn btn-outline-success ml-auto mb-3 mb-sm-0 btn-sm" data-toggle="tooltip" data-placement="top" title="Edit Data Kelas & Jurusan">
                            <i class="fa fa-check-double"></i>
                        </a>
                    @elseif ($data_kelas->tingkat_kelas == 'XII (12)')
                        <a href="{{route('edit-check-list-kelas-jurusan-kls12', $data_kelas->id)}}" class="btn btn-outline-success ml-auto mb-3 mb-sm-0 btn-sm" data-toggle="tooltip" data-placement="top" title="Edit Data Kelas & Jurusan">
                            <i class="fa fa-check-double"></i>
                        </a>
                    @endif
                    

                    <button class="btn btn-outline-danger ml-1 mb-3 mb-sm-0  btn-sm" id="btn-co-delete" name="select_delete[]" type="submit"  data-toggle="tooltip" data-placement="top" title="Hapus Data">
                        <i class="icon ion-trash-b pr-2"></i>Hapus
                    </button>
                </div>
                
                <hr>
                <hr>
                <br>

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
                                
                                <th class="text-center" data-toggle="tooltip" data-placement="top" title="Select Delete">
                                    <i style="font-size:18px;" class="fas fa-check-square"></i>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($data_siswa as $ds)
                                <tr>
                                    <td class="text-center">{{$loop->iteration}}</td>
                                    <td class="text-center">{{$ds->nama_peserta_didik}} <br></td>
                                    <td class="text-center">{{$ds->nis}}</td>
                                    <td class="text-center">
                                        @if ($ds->jk_siswa == 'L')
                                            {{-- <span class="badge badge-primary" style="font-size:12px;">Laki - Laki</span>  --}}
                                            Laki - Laki
                                        @elseif($ds->jk_siswa == 'P')
                                            {{-- <span class="badge badge-danger" style="font-size:12px;">Perempuan</span>  --}}
                                            Perempuan
                                        @elseif($ds->jk_siswa == '-')
                                            -
                                        @endif
                                    </td>
                                    <td class="text-center">

                                        @if ($ds->relasi_sekarang_kelas->tingkat_kelas == 'X (10)')
                                            <a href="{{route('management-edit-data-students-kelas-10', $ds->id)}}" class="btn-sm btn btn-outline-success"div><i class="icon ion-compose mr-1"></i>Edit</div></a>
                                            <a href="{{route('management-detail-data-students-kelas-10', $ds->id)}}" class="btn-sm btn btn-outline-purple"div><i class="fas fa-info-circle mr-1"></i>Detail</div></a>
                                        @elseif ($ds->relasi_sekarang_kelas->tingkat_kelas == 'XI (11)')
                                            <a href="{{route('management-edit-data-students-kelas-11', $ds->id)}}" class="btn-sm btn btn-outline-success"div><i class="icon ion-compose mr-1"></i>Edit</div></a>
                                            <a href="{{route('management-detail-data-students-kelas-11', $ds->id)}}" class="btn-sm btn btn-outline-purple"div><i class="fas fa-info-circle mr-1"></i>Detail</div></a>
                                        @elseif ($ds->relasi_sekarang_kelas->tingkat_kelas == 'XII (12)')
                                            <a href="{{route('management-edit-data-students-kelas-12', $ds->id)}}" class="btn-sm btn btn-outline-success"div><i class="icon ion-compose mr-1"></i>Edit</div></a>
                                            <a href="{{route('management-detail-data-students-kelas-12', $ds->id)}}" class="btn-sm btn btn-outline-purple"div><i class="fas fa-info-circle mr-1"></i>Detail</div></a>
                                        @endif

                                    </td>
                                    <td class="text-center">
                                        @if ($ds->status == 'not_active')
                                            <a class="btn-sm btn btn-outline-warning" id="active-button" href="{{route('management-students-set-active', $ds->id)}}"  data-toggle="tooltip" data-placement="right" title="Status Guru Belum Aktif"><i class="fa fa-clock"></i></a>
                                        @elseif($ds->status == 'active')
                                            <a class="btn-sm btn btn-outline-success" id="non-active-button" href="{{route('management-students-set-notactive', $ds->id)}}"  data-toggle="tooltip" data-placement="right" title="Status Guru Sudah Aktif"><i class="fa fa-user-check" ></i></a>
                                        
                                        @endif 
                                    </td>
                                    <td class="text-center" style="padding-top: 1.5%;"><input type="checkbox" name="select_delete[]" value="{{$ds->id}}"></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> 
            </div>
        </form>

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
        // // Start Confirm Select Delete Using SweetAlert2
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
