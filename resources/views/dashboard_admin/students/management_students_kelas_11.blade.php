@extends('layouts.master_admin_e-raport')

@section('br-mainpanel')
    {{-- br-header --}}
    <div class="br-pageheader">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('home')}}">E-Raport</a>
            <a class="breadcrumb-item" href="#">Management Siswa</a>
            <span class="breadcrumb-item active">Management Siswa Kelas 11</span>
        </nav>
    </div><!-- br-pageheader -->

    {{-- br-title --}}
    <div class="br-pagetitle">
        <i class="fas fa-users" style="font-size:65px;color:#000;"></i>
        <div>
            <h4>Management Siswa Kelas 11</h4>
            <p class="mg-b-0">Aplikasi E-Raport Berbasis Web SMKN 4 Kota Bekasi.</p>
        </div>

        <div class="col-sm-4 mb-3 ml-auto mb-3 mb-sm-0 mt-1 btn-sm" >
            <div class="input-group">
                    <input type="text" name="" id="example_search" class="form-control" placeholder="Search  ...">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
                    </div>
                </div><!-- input-group -->
        </div><!-- col-4 -->
    </div>


    <div class="br-pagebody pd-x-20 pd-sm-x-30 ">
        <div class="row row-sm mg-t-20 x_include">
            @include('dashboard_admin.students.search_ajax_kelas_11')
        </div>
    </div>

@endsection




@push('footer-admin')
    <script>
        // Live search with ajax
        $(document).ready(function(){

            function fetch_data(search="") {
                $.ajax({    
                    url:BASE_URL+"/search-ajax-kelas-11?search="+search,
                    success:function(data){
                        $('.x_include').html(data);
                    }
                    
                })
            }

            $(document).on('keyup', '#example_search', function(){
                var search = $('#example_search').val();
                fetch_data(search);
                
                // if (search == false) {
                //     location.reload();
                // }
                
            });
        });

    </script>

    <script>
        // Untuk Membuat Tooltip
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
@endpush