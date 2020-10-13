<!DOCTYPE html>
<html lang="en">
<head>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    


    <!-- Scripts -->
        {{-- <script src="{{ asset('js/app.js') }}" ></script> --}}

        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>

        {{-- 
        <script
            src="js/jquery-3.4.1.min.js">
        </script> 
        --}}

        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.0/jQuery.print.min.js"></script> --}}



    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Bracket Plus">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/bracketplus/img/bracketplus-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/bracketplus">
    <meta property="og:title" content="Bracket Plus">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/bracketplus/img/bracketplus-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/bracketplus/img/bracketplus-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>Admin E-Raport</title>
    <link rel="icon" href="/bracket-master/app/img/favicon-smkn4.png" type="image/png">



    <!-- vendor css -->
    <link href="/bracket-master/app/lib/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="/bracket-master/app/lib/ionicons/css/ionicons.min.css" rel="stylesheet">

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="/bracket-master/app/css/bracket.css">

    {{-- favicon --}}
    <link rel="shortcut icon" href="" />
    
	<link href="/bracket-master/app/lib/highlightjs/styles/github.css" rel="stylesheet">

    {{-- Datatable --}}
    <link href="/bracket-master/app/lib/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="/bracket-master/app/lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet">

    {{-- Summernote --}}
    <link href="/bracket-master/app/lib/summernote/summernote-bs4.css" rel="stylesheet">

    {{-- DateTimePicker --}}
    <link rel="stylesheet" href="/bracket-master/app/js/datetimepicker/jquery.datetimepicker.min.css">
</head>

<body>

    
    <!-- ########## START: LEFT PANEL ########## -->
    <div class="br-logo" style="font-size:20px;"><a href=""><span>[</span>Elektronik <i>Raport</i><span>]</span></a></div>
    <div class="br-sideleft sideleft-scrollbar">
        <label class="sidebar-label pd-x-10 mg-t-20 op-3">Navigation</label>
        <ul class="br-sideleft-menu">

        <li class="br-menu-item">
            <a href="{{route('home')}}" class="br-menu-link {{ request()->is('home') ? 'active' : '' }}">
            <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
            <span class="menu-item-label">Dashboard</span>
            </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->

        <li class="br-menu-item">
            <a href="{{route('school-identity.index')}}" class="br-menu-link {{ request()->is('school-identity') ? 'active' : '' }}">
            <i class=" fas fa-school tx-17"></i>
            <span class="menu-item-label">Identitas Sekolah</span>
            </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->

        <li class="br-menu-item">
            <a href="semester-active" class="br-menu-link {{ request()->is('semester-active') ? 'active' : '' }}">
            <i class="far fa-calendar-alt tx-18"></i>
            <span class="menu-item-label">Set Semester Aktif</span>
            </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->

        <li class="br-menu-item">
                <a href="#" class="br-menu-link with-sub {{ request()->is('user','user/create', 'user/*/edit', 'user/*') ? 'active' : '' }}">
                <i class="menu-item-icon icon ion-person tx-20"></i>
                <span class="menu-item-label">Management User</span>
                </a><!-- br-menu-link -->
                <ul class="br-menu-sub nav flex-column">
                    <li class="sub-item"><a href="{{route('user.index')}}" class="sub-link {{ request()->is('user', 'user/create', 'user/*/edit', 'user/*') ? 'active' : '' }}">Management User</a></li>
                </ul>
        </li><!-- br-menu-item -->

        <li class="br-menu-item">
                <a href="#" class="br-menu-link with-sub {{ request()->is('mapel', 'kelas', 'ekskul', 'jurusan') ? 'active' : '' }}">
                <i class="menu-item-icon icon ion-folder tx-20"></i>
                <span class="menu-item-label">Management Master</span>
                </a><!-- br-menu-link -->
                <ul class="br-menu-sub nav flex-column">
                    <li class="sub-item"><a href="{{route('mapel.index')}}" class="sub-link {{ request()->is('mapel') ? 'active' : '' }}">Management Mapel</a></li> 
                    <li class="sub-item"><a href="{{route('kelas.index')}}" class="sub-link {{ request()->is('kelas') ? 'active' : '' }}">Management Kelas</a></li>
                    <li class="sub-item"><a href="{{route('jurusan.index')}}" class="sub-link {{ request()->is('jurusan') ? 'active' : '' }}">Management Jurusan</a></li>
                    <li class="sub-item"><a href="{{route('ekskul.index')}}" class="sub-link {{ request()->is('ekskul') ? 'active' : '' }}">Management Ekskul</a></li>
                </ul>
        </li><!-- br-menu-item -->

        <li class="br-menu-item">
                <a href="#" class="br-menu-link with-sub {{ request()->is('teacher', 'teacher/create', 'teacher/*/edit', 'teacher/*') ? 'active' : '' }}">
                <i class="fas fa-chalkboard-teacher tx-17"></i>
                <span class="menu-item-label">Management Guru</span>
                </a><!-- br-menu-link -->
                <ul class="br-menu-sub nav flex-column">
                    <li class="sub-item"><a href="{{route('teacher.index')}}" class="sub-link {{ request()->is('teacher', 'teacher/create', 'teacher/*/edit', 'teacher/*') ? 'active' : '' }}">Management Guru</a></li>
                </ul>
        </li><!-- br-menu-item -->

        <li class="br-menu-item">
                <a href="#" class="br-menu-link with-sub 
                {{ request()->is('management-data-baru', 'management-data-baru-create', 'add-check-list-kelas-jurusan','management-edit-data-students-data-baru/*','management-detail-data-students-data-baru/*',
                                'management-students-kelas-10', 'management-students-kelas-10-table/*', 'management-detail-data-students-kelas-10/*', 'management-edit-data-students-kelas-10/*', 'edit-check-list-kelas-jurusan-kls10/*',
                                'management-students-kelas-11', 'management-students-kelas-11-table/*', 'management-detail-data-students-kelas-11/*', 'management-edit-data-students-kelas-11/*', 'edit-check-list-kelas-jurusan-kls11/*',
                                'management-students-kelas-12', 'management-students-kelas-12-table/*', 'management-detail-data-students-kelas-12/*', 'management-edit-data-students-kelas-12/*', 'edit-check-list-kelas-jurusan-kls12/*') ? 'active' : '' }}">
                <i class="fas fa-users tx-17"></i>
                <span class="menu-item-label">Management Siswa</span>
                </a><!-- br-menu-link -->
                <ul class="br-menu-sub nav flex-column">
                    <li class="sub-item"><a href="{{route('management-data-baru')}}" class="sub-link {{ request()->is('management-data-baru', 'management-data-baru-create', 'add-check-list-kelas-jurusan', 'management-edit-data-students-data-baru/*', 'management-detail-data-students-data-baru/*') ? 'active' : '' }}">Management Data Baru</a></li>
                    <li class="sub-item"><a href="{{route('management-students-kelas-10')}}" class="sub-link {{ request()->is('management-students-kelas-10','management-students-kelas-10-table/*', 'management-detail-data-students-kelas-10/*', 'management-edit-data-students-kelas-10/*', 'edit-check-list-kelas-jurusan-kls10/*') ? 'active' : '' }}">Management Siswa Kelas 10</a></li>
                    <li class="sub-item"><a href="{{route('management-students-kelas-11')}}" class="sub-link {{ request()->is('management-students-kelas-11','management-students-kelas-11-table/*', 'management-detail-data-students-kelas-11/*', 'management-edit-data-students-kelas-11/*', 'edit-check-list-kelas-jurusan-kls11/*') ? 'active' : '' }}">Management Siswa Kelas 11</a></li>
                    <li class="sub-item"><a href="{{route('management-students-kelas-12')}}" class="sub-link {{ request()->is('management-students-kelas-12','management-students-kelas-12-table/*', 'management-detail-data-students-kelas-12/*', 'management-edit-data-students-kelas-12/*', 'edit-check-list-kelas-jurusan-kls12/*') ? 'active' : '' }}">Management Siswa Kelas 12</a></li>
                </ul>
        </li><!-- br-menu-item -->

        <li class="br-menu-item">
                <a href="#" class="br-menu-link with-sub {{ request()->is('kehadiran-bulanan-siswa') ? 'active' : '' }}">
                <i class="fa fa-tasks tx-17"></i>
                <span class="menu-item-label">Data Kehadiran Siswa</span>
                </a><!-- br-menu-link -->
                <ul class="br-menu-sub nav flex-column">
                    <li class="sub-item"><a href="{{route('kehadiran-bulanan-siswa')}}" class="sub-link {{ request()->is('kehadiran-bulanan-siswa') ? 'active' : '' }}">Kehadiran Bulanan Siswa</a></li>
                </ul>
        </li><!-- br-menu-item -->

        <br>
    </div><!-- br-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
    <div class="br-header">
        <div class="br-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="input-group hidden-xs-down wd-170 transition">
            <input id="searchbox" type="text" class="form-control" placeholder="Search">
            <span class="input-group-btn">
            <button class="btn btn-secondary" type="button"><i class="fa fa-search"></i></button>
            </span>
        </div><!-- input-group -->
        </div><!-- br-header-left -->

        {{-- Profile --}}
        <div class="br-header-right">
        <nav class="nav">
            <div class="dropdown">
            <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
                <span class="logged-name hidden-md-down">{{Auth::user()->name}}</span>
                <img src="{{url('/storage/user/'.Auth::user()->foto_user)}}" class="wd-32 rounded-circle" alt="">
                <span class="square-10 bg-success"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-header wd-250">
                <div class="tx-center">
                <a href=""><img src="{{url('/storage/user/'.Auth::user()->foto_user)}}" class="wd-80 rounded-circle" alt=""></a>
                <h6 class="logged-fullname">{{Auth::user()->name}}</h6>
                <p>{{Auth::user()->email}}</p>
                </div>
                <hr>
                <div class="tx-center">
                    <label class="sidebar-label pd-x-25 mg-t-25" style="color:black">Time &amp; Date</label>
                    <div class="pd-x-25">
                        <h4 id="brTime" class="br-time" style="color:#000;"></h4>
                        <h6 id="brDate" class="br-date" style="color:#000;"></h6>
                    </div>
                </div>
                <hr>
                <ul class="list-unstyled user-profile-nav">
                    {{-- <li><a href=""><i class="icon ion-ios-person"></i> Edit Profile</a></li>
                    <li><a href=""><i class="icon ion-ios-gear"></i> Settings</a></li> --}}

                    {{-- <li><a href="{{route('edit-password-ao')}}"><i class="icon ion-wrench"></i>Edit Password</a></li> --}}

                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();"><i class="icon ion-power"></i>
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        
                    </li>
                </ul>
            </div><!-- dropdown-menu -->
            </div><!-- dropdown -->
        </nav>
        </div><!-- br-header-right -->


    </div><!-- br-header -->
    <!-- ########## END: HEAD PANEL ########## -->

    <!-- ########## START: RIGHT PANEL ########## -->
    <!-- ########## END: RIGHT PANEL ########## --->



    
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
        @yield('br-mainpanel')

        <footer class="br-footer">
            <div class="footer-left">
                <div class="mg-b-2">Copyright &copy; 2020. Diaz Djuliansyah.</div>
                <div>Teknik Komputer Jaringan. SMKN 4 Kota Bekasi</div>
                <div class="">
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script>  Bracket Plus | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://themeforest.net/search/bracket%20plus?gclid=CjwKCAjw4871BRAjEiwAbxXi2_aqXW4I8QDrNC9yfj87XDbTpVVhW9ul5Gxfq4NHLQ8nVkdxXB7z2BoCnLAQAvD_BwE" target="_blank">themeforest</a>
                </div>
            </div>
            <div class="footer-right d-flex align-items-center">
                <span class="tx-uppercase mg-r-10">Check:</span>
                <a target="_blank" class="pd-x-5" href=""><i class="fab fa-facebook tx-20"></i></a>
                <a target="_blank" class="pd-x-5" href=""><i class="fab fa-instagram tx-20"></i></a>
            </div>
        </footer>
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    <script src="/bracket-master/app/lib/jquery/jquery.min.js"></script>
    <script src="/bracket-master/app/lib/jquery-ui/ui/widgets/datepicker.js"></script>
    <script src="/bracket-master/app/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/bracket-master/app/lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="/bracket-master/app/lib/moment/min/moment.min.js"></script>
    <script src="/bracket-master/app/lib/peity/jquery.peity.min.js"></script>
    <script src="/bracket-master/app/js/bracket.js"></script>

    <script src="/bracket-master/app/lib/jquery-steps/build/jquery.steps.min.js"></script>
    <script src="/bracket-master/app/lib/parsleyjs/parsley.min.js"></script>

    {{-- Datatable --}}
    <script src="/bracket-master/app/lib/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/bracket-master/app/lib/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
    <script src="/bracket-master/app/lib/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/bracket-master/app/lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js"></script>
    <script src="/bracket-master/app/lib/highlightjs/highlight.pack.min.js"></script>

    {{-- Summernote --}}
    <script src="/bracket-master/app/lib/summernote/summernote-bs4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    
    {{-- DateTimePicker --}}
    <script src="/bracket-master/app/js/datetimepicker/jquery.datetimepicker.full.js"></script>
    <script src="/bracket-master/app/js/datetimepicker/jquery.datetimepicker.full.min.js"></script>
    <script src="/bracket-master/app/js/datetimepicker/jquery.datetimepicker.min.js"></script>



    @stack('footer-admin')
    @stack('datetime-picker')
    @stack('summernote')
    @stack('btn-confirm')

    @include('sweetalert::alert')

</body>
</html>

