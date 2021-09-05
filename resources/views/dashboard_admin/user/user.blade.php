@extends('layouts.master_admin_e-raport')

@section('br-mainpanel')
    {{-- br-header --}}
    <div class="br-pageheader">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('home')}}">E-Raport</a>
            <a class="breadcrumb-item" href="#">Management User</a>
            <span class="breadcrumb-item active">Management User</span>
        </nav>
    </div><!-- br-pageheader -->

    {{-- br-title --}}
    <div class="br-pagetitle">
        <i class="fas fa-users-cog" style="font-size:65px;color:#000;"></i>
        <div>
            <h4>Management User</h4>
            <p class="mg-b-0">Aplikasi E-Raport Berbasis Web SMKN 4 Kota Bekasi.</p>
        </div>
    </div>

    {{-- br-body --}}
    <div class="br-pagebody">

        <div class="br-section-wrapper">
            <div class="d-sm-flex align-items-center mb-4">
                    
                <div class="mg-t-20 mg-lg-t-0">
                    Action Management User
                </div><!-- col-4 -->


                <a href="{{route('user.create')}}" class="btn btn-info btn-with-icon ml-auto mb-3 mb-sm-0">
                    <div class="ht-40">
                        <span class="icon wd-40"><i class="icon ion-person-add" style="font-size:20px;" ></i></span>
                        <span class="pd-x-15">Create User</span>
                    </div>
                </a>
            </div>
            
            <hr>
            <hr>
            <br>

            <form action="{{route('select-delete-user')}}" method="post" >
                @csrf
                <div class="table-wrapper table-responsive-md">
                    <table id="table_id" class="table display responsive nowrap" >
                        <thead class="thead-colored thead-indigo">
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Foto</th>
                                <th class="text-center">Nama User</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Level</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                                <th class="text-center">
                                    <div>
                                        <button class="btn btn-danger btn-icon" id="btn-co-delete" name="select_delete[]" type="submit">
                                            <i class="icon ion-trash-b p-2"></i>
                                        </button>
                                    </div>
                                </th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($data as $d)
                                <tr>
                                    <td class="text-center pt-4">{{$loop->iteration}}</td>
                                    <td class="text-center">
                                        @if ($d->foto_user == true)
                                            {{-- GET IMAGE FROM STORAGE LARAVEL --}}
                                            {{-- <img style="width: 50px; height:50px;border-radius:50%;" src="{{url('/storage/user/'.$d->foto_user)}}"> --}}
                                            
                                            {{-- GET IMAGE FROM STORAGE CLOUDINARY --}}
                                            <img style="width: 50px; height:50px;border-radius:50%;" src="{{$d->foto_user}}">
                                        @else
                                            <img style="width: 50px; height:50px;border-radius:50%;" src="/folder-pendukung/user-polos.png">
                                        @endif

                                    </td>
                                    <td class="text-center pt-4">{{$d->name}}</td>
                                    <td class="text-center pt-4">{{$d->email}}</td>
                                    <td class="text-center pt-4">
                                        @if ($d->level == 'A')
                                            <span class="badge badge-primary" style="font-size:12px;">Admin</span> 
                                        @elseif($d->level == 'O')
                                            <span class="badge badge-info" style="font-size:12px;">Operator</span> 
                                        @endif
                                    </td>


                                    
                                    <td class="text-center pt-3">
                                        {{-- Admin --}}
                                        @if ($d->level == 'A')
                                            @if ($d->status == 'not_active')
                                                <a class="badge badge-warning p-2 ml-3 mr-1 mt-1" id="active-button"  href="{{route('user.active', $d->id)}}"><i class="fa fa-clock mr-2"></i>Belum Aktif</a>
                                            @elseif($d->status == 'active')    
                                                <span class="badge badge-primary p-2 ml-3 mr-1 mt-1"><i class="fa fa-user-check mr-2"></i> Admin Aktif</span>
                                            @endif

                                        {{-- Operator --}}
                                        @elseif($d->level == 'O')
                                            @if ($d->status == 'not_active')
                                                <a class="badge badge-warning p-2 ml-3 mr-1 mt-1" id="active-button" href="{{route('user.active', $d->id)}}"><i class="fa fa-clock mr-2"></i>Belum Aktif</a>
                                            @elseif($d->status == 'active')
                                                <a class="badge badge-success p-2 ml-3 mr-1 mt-1" id="non-active-button" href="{{route('user.not-active', $d->id)}}"><i class="fa fa-user-check mr-2"></i>User Aktif</a>
                                            @endif 
                                        @endif  

                                    </td>
                                    <td class="text-center pt-3">
                                        <a href="{{route('user.edit', $d->id)}}" class="btn btn-outline-success btn-icon rounded-circle mr-1"><div><i class="icon ion-compose" style="font-size:23px;"></i></div></a>
                                        <a href="{{route('user.show', $d->id)}}" class="btn btn-outline-purple btn-icon rounded-circle ml-1"><div><i class="fas fa-info-circle" style="font-size:23px;"></i></div></a>
                                        {{-- <a href="" class="btn btn-outline-danger btn-icon rounded-circle ml-1"><div><i class="icon ion-trash-b" style="font-size:23px;"></i></div></a> --}}
                                    </td>
                                    <td class="text-center pt-4"><input type="checkbox" name="select_delete[]" value="{{$d->id}}"></td>
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
                    text: "Anda akan mengaktifkan user ini!",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, active it!'
                }).then((result) => {
                    if (result.value) {
                        Swal.fire(
                            'Success!',
                            'User Berhasil Di Aktifkan.',
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
                    text: "Anda akan menonaktifkan user!",
                    icon: 'error',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, non active it!'
                }).then((result) => {
                    if (result.value) {
                        Swal.fire(
                        'Success!',
                        'User Berhasil Di Non-Aktifkan.',
                        'success'
                        )
                        window.location.href = url;
                    }
                });
                
            });
        // End Confirm Non Active User Using SweetAlert2
        
    </script>




@endpush
