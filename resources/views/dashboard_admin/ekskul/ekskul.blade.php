@extends('layouts.master_admin_e-raport')

@section('br-mainpanel')
    {{-- br-header --}}
    <div class="br-pageheader">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('home')}}">E-Raport</a>
            <a class="breadcrumb-item" href="#">Management Master</a>
            <span class="breadcrumb-item active">Management Ekskul</span>
        </nav>
    </div><!-- br-pageheader -->

    {{-- br-title --}}
    <div class="br-pagetitle">
        <i class="fas fa-futbol" style="font-size:65px;color:#000;"></i>
        <div>
            <h4>Management Ekskul</h4>
            <p class="mg-b-0">Aplikasi E-Raport Berbasis Web SMKN 4 Kota Bekasi.</p>
        </div>
    </div>
    {{-- br-body --}}
    <div class="br-pagebody">

        <div class="br-section-wrapper">
            
        <div class="d-sm-flex align-items-center mb-4">
            <div class="mg-t-20 mg-lg-t-0">
                Action Management Ekskul
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Ekskul Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <form action="{{route('ekskul.store')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row" style="margin:0px;">
                                    <label class="col-md-4 col-form-label" for="nama_ekskul_cr"><h6 style="color: black;">Nama Ekskul</h6></label>
                                    
                                    <div class="col-md-8">
                                        <input type="text" name="nama_ekskul" class="form-control" id="nama_ekskul_cr" placeholder=""  style="height:30px;" required >
                                    </div>
                                </div>

                                <div class="form-group row" style="margin:0px;">
                                    <label class="col-md-4 col-form-label" for="pembina_ekskul_cr"><h6 style="color: black;">Pembina Ekskul</h6></label>                                   
                                    
                                    <div class="col-md-8">
                                        <input type="text" name="pembina_ekskul" class="form-control" id="pembina_ekskul_cr" placeholder=""  style="height:30px;">
                                    </div>
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



        <!-- Start Edit Model -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Mapel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <form action="/ekskul" method="POST" id="editForm">
                    @csrf
                    {{method_field('PUT')}}
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row" style="margin:0px;">
                                    <label class="col-md-3 col-form-label" for=""><h6 style="color: black;">Nama Ekskul</h6></label>
                                    
                                    <div class="col-md-9">
                                        <input type="text" name="nama_ekskul" class="form-control" id="nama_ekskul_ed" placeholder=""  style="height:30px;" required >
                                    </div>
                                </div>

                                <div class="form-group row" style="margin:0px;">
                                    <label class="col-md-3 col-form-label" for=""><h6 style="color: black;">Pembina Ekskul</h6></label>                                   
                                    
                                    <div class="col-md-9">
                                        <input type="text" name="pembina_ekskul" class="form-control" id="pembina_ekskul_ed" placeholder=""  style="height:30px;" required >
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-outline-primary btn-sm ">Update</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
        {{-- End Edit MOdel --}}
        
        <hr>
        <hr>
        <br>

        <div class="table-wrapper table-responsive-md">
            <table id="table_id" class="table display responsive" >
                <thead class="thead-colored thead-primary">
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama Ekskul</th>
                        <th class="text-center">Pembina Ekskul</th>
                        <th class="text-center">Action</th>
                        <th class="text-center">ID</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $d)
                        <tr>
                            <td class="text-center pt-2">{{$loop->iteration}}</td>
                            <td class="text-center pt-2">{{$d->nama_ekskul}}</td>
                            <td class="text-center pt-2">{{$d->pembina_ekskul}}</td>
                            <td class="text-center">
                                <a href="#" class="btn-sm btn btn-outline-success open-modal"div><i class="icon ion-compose mr-1"></i>Edit</div></a>
                                <a href="{{route('ekskul.destroy', $d->id)}}" class="btn-sm btn btn-outline-danger confirm-delete-button"><div><i class="fas fa-info-circle mr-1"></i>Hapus</div></a>
                            </td>
                            <td class="text-center pt-2">{{$d->id}}</td>
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
                    
            // Start Edit Modal
                table.on('click', '.open-modal', function (){
                    
                    $tr = $(this).closest('tr');
                    if ($($tr).hasClass('child')) {
                        $tr = $tr.prev('.parent');
                    }

                    var data = table.row($tr).data();
                    console.log(data);

                    $('#nama_ekskul_ed').val(data[1]);
                    $('#pembina_ekskul_ed').val(data[2]);

                    $('#editForm').attr('action', '/ekskul/'+ data[4]);
                    $('#editModal').modal('show');
                });
            // End Edit Modal

        } );
    </script>


    {{-- LINK untuk sweetalert 2 sudah di taro di file master_admin_e-raport --}}
    <script>
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
@endpush
