{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}





@extends('layouts.master_admin_e-raport')
@section('br-mainpanel')
    <div class="br-pagetitle">
        <i class="icon ion-ios-home-outline"></i>
        <div>
            <h4>Dashboard</h4>
            <p class="mg-b-0">Aplikasi E-Raport Berbasis Web SMKN 4 Kota Bekasi.</p>
        </div>
    </div>

    <div class="br-pagebody">

        {{-- <div class="row row-sm">
            <div class="col-sm-6 col-xl-3">
                <div class="bg-primary rounded overflow-hidden">
                    <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                    <i class="fa fa-users tx-50 lh-0 tx-white op-7"></i>
                    <div class="mg-l-20">
                        <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Text</p>
                        <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1"></p>
                        <span class="tx-11 tx-roboto tx-white-8"></span>
                    </div>
                    </div>
                    <div id="ch1" class="ht-50 tr-y-1"></div>
                </div>
            </div><!-- col-3 -->

            <div class="col-sm-6 col-xl-3 ">
                <div class="bg-success rounded overflow-hidden">
                    <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                    <i class="fa fa-user-check tx-50 lh-0 tx-white op-7"></i>
                    <div class="mg-l-20">
                        <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Text</p>
                        <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1"></p>
                        <span class="tx-11 tx-roboto tx-white-8"></span>
                    </div>
                    </div>
                    <div id="ch2" class="ht-50 tr-y-1"></div>
                </div>
            </div><!-- col-3 -->

            <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
            <div class="bg-warning rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                <i class="fa fa-clock tx-50 lh-0 tx-white op-7"></i>
                <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Text</p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1"></p>
                    <span class="tx-11 tx-roboto tx-white-8"></span>
                </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
            </div>
            </div><!-- col-3 -->
            
            <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
            <div class="bg-danger rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                <i class="fa fa-user-times tx-50 lh-0 tx-white op-7"></i>
                <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Text</p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1"></p>
                    <span class="tx-11 tx-roboto tx-white-8"></span>
                </div>
                </div>
                <div id="ch4" class="ht-50 tr-y-1"></div>
            </div>
            </div><!-- col-3 -->
            
            
        </div><!-- row --> --}}
        <div class="row row-sm">
            <div class="col-sm-6 col-xl-3">
                <div class="bg-info rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                    <i class="ion ion-earth tx-60 lh-0 tx-white op-7"></i>
                    <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Today's Visits</p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">1,975,224</p>
                    <span class="tx-11 tx-roboto tx-white-8">24% higher yesterday</span>
                    </div>
                </div>
                <div id="ch1" class="ht-50 tr-y-1"></div>
                </div>
            </div><!-- col-3 -->
            <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
                <div class="bg-purple rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                    <i class="ion ion-bag tx-60 lh-0 tx-white op-7"></i>
                    <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Today Sales</p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">$329,291</p>
                    <span class="tx-11 tx-roboto tx-white-8">$390,212 before tax</span>
                    </div>
                </div>
                <div id="ch3" class="ht-50 tr-y-1"></div>
                </div>
            </div><!-- col-3 -->
            <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
                <div class="bg-teal rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                    <i class="ion ion-monitor tx-60 lh-0 tx-white op-7"></i>
                    <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">% Unique Visits</p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">54.45%</p>
                    <span class="tx-11 tx-roboto tx-white-8">23% average duration</span>
                    </div>
                </div>
                <div id="ch2" class="ht-50 tr-y-1"></div>
                </div>
            </div><!-- col-3 -->
            <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
                <div class="bg-primary rounded overflow-hidden">
                <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                    <i class="ion ion-clock tx-60 lh-0 tx-white op-7"></i>
                    <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Bounce Rate</p>
                    <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">32.16%</p>
                    <span class="tx-11 tx-roboto tx-white-8">65.45% on average time</span>
                    </div>
                </div>
                <div id="ch4" class="ht-50 tr-y-1"></div>
                </div>
            </div><!-- col-3 -->
        </div><!-- row -->
        <br>

        <div class="row row-sm">
            <div class="col-sm-4 mt-1">
                <div class="card">
                    <div class="card-header tx-medium bd-0 tx-white bg-mantle">
                        <span>Profil</span>
                        <span>
                            @if (Auth::user()->level == 'A')
                                <span >Admin</span> 
                            @elseif(Auth::user()->level == 'O')
                                <span>Operator</span> 
                            @endif  
                        </span>
                        <span>E-Raport</span>
                    </div><!-- card-header -->
                    <div class="card-body">
                        <div class="text-center">
                            <img class="img-fluid rounded-circle " style="width:130px;height:135px;" src="{{url('/storage/user/'.Auth::user()->foto_user)}}" alt="">
                        </div>

                        <div class="rounded-bottom mt-3">
                            <ul class="list-group">
                                <li class="list-group-item rounded-top-0">
                                    <p class="mg-b-0">
                                    <i class="fa fa-tags tx-info mg-r-8"></i>
                                    <tr>
                                        <th><strong class="tx-inverse tx-medium">Nama User</strong></th>
                                        <td><span class="text-muted">:</span></td>
                                        <th><span class="text-muted">{{Auth::user()->name}}</span></th>
                                    </tr>
                                    </p>
                                </li>
                                <li class="list-group-item rounded-top-0">
                                    <p class="mg-b-0">
                                    <i class="fa fa-tags tx-info mg-r-8"></i>
                                    <tr>
                                        <th><strong class="tx-inverse tx-medium">Email</strong></th>
                                        <td><span class="text-muted">:</span></td>
                                        <th><span class="text-muted">{{Auth::user()->email}}</span></th>
                                    </tr>
                                    </p>
                                </li>
                                <li class="list-group-item rounded-top-0">
                                    <p class="mg-b-0">
                                    <i class="fa fa-tags tx-info mg-r-8"></i>
                                    <tr>
                                        <th><strong class="tx-inverse tx-medium">Level</strong></th>
                                        <td><span class="text-muted">:</span></td>
                                        <th><span class="text-muted">
                                                @if (Auth::user()->level == 'A')
                                                    <span class="badge badge-primary" style="font-size:12px;">Admin</span> 
                                                @elseif(Auth::user()->level == 'O')
                                                    <span class="badge badge-info" style="font-size:12px;">Operator</span> 
                                                @endif    
                                        </span></th>
                                    </tr>
                                    </p>
                                </li>
                                <li class="list-group-item rounded-top-0">
                                    <p class="mg-b-0">
                                    <i class="fa fa-tags tx-info mg-r-8"></i>
                                    <tr>
                                        <th><strong class="tx-inverse tx-medium">Tanggal Register</strong></th>
                                        <td><span class="text-muted">:</span></td>
                                        <th><span class="text-muted">{{date('d M Y', strtotime(Auth::user()->created_at))}}</span></th>
                                    </tr>
                                    </p>
                                </li>
                                <!-- add more here -->
                            </ul>
                        </div><!-- card-body -->
                    </div>
                    
                </div><!-- card -->
            </div>

            <div class="col-sm-8 mt-1">
                <div class="card bd-0 shadow-base pd-20">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.2633759019077!2d106.92984501431162!3d-6.359947563986839!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6993411a5d5955%3A0x3070600ac1dee970!2sSMK%20Negeri%204%20Kota%20Bekasi!5e0!3m2!1sid!2sid!4v1571283969085!5m2!1sid!2sid" width="100%" height="450px" frameborder="0" style="border:0;" allowfullscreen="">
                    </iframe>
                </div><!-- card -->
            </div>
        </div><!-- row -->

    </div><!-- br-pagebody -->
@endsection

