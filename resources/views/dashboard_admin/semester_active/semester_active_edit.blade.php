@extends('layouts.master_admin_e-raport')

@section('br-mainpanel')
    {{-- br-header --}}
    <div class="br-pageheader">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{route('home')}}">E-Raport</a>
            <a class="breadcrumb-item" href="{{route('semester-active.index')}}">Semester Active</a>
            <span class="breadcrumb-item active">Edit Semester Active</span>
        </nav>
    </div><!-- br-pageheader -->

    {{-- br-title --}}
    <div class="br-pagetitle">
        <i class="far fa-calendar-alt" style="font-size:65px;color:#000;"></i>
        <div>
            <h4>Edit Semester Active</h4>
            <p class="mg-b-0">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        </div>
    </div>

    {{-- br-body --}}
    <div class="br-pagebody">
        <div class="br-section-wrapper">
        <div class="row justify-content-center">
        <div class="col-12 grid-margin">
                <div class="d-md-flex align-items-center mb-4">
                    <h5 class="card-title mb-md-0">Form Edit Semester Active</h5>

                </div>
                <br>                
                <form class="form-sample" action="{{route('semester-active.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{method_field('put')}}

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Kepsek</label>
                                <input type="text" name="nama_kepsek" class="form-control" id="exampleInputEmail1"  placeholder="Nama Kepsek" value="{{$data->nama_kepsek}}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">NIP Kepsek</label>
                                <input type="atribut" min="0" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57" name="nip_kepsek" class="form-control" id="exampleInputEmail1"  placeholder="NIP Kepsek" value="{{$data->nip_kepsek}}" >
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">PTS /PAS</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="pts_pas" required>
                                    <optgroup label="PTS / PAS Lama">
                                        <option  value="{{$data->pts_pas}}">
                                            @if ($data->pts_pas == 'PTS')
                                                <span>Penilaian Tengah Semester</span>
                                            @elseif($data->pts_pas == 'PAS')
                                                <span>Penilaian Akhir Semester</span>    
                                            @endif
                                        </option>
                                    </optgroup>  
                                    <optgroup label="PTS / PAS Baru">  
                                        <option value="PTS">Penilaian Tengah Semester</option>
                                        <option value="PAS">Penilaian Akhir Semester</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Semester</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="semester" required>
                                    <optgroup label="Semester Lama">
                                        <option  value="{{$data->semester}}">
                                            @if ($data->semester == 'ganjil')
                                                <span>Semester Ganjil</span>
                                            @elseif($data->semester == 'genap')
                                                <span>Semester Genap</span>    
                                            @endif
                                        </option>
                                    </optgroup>  
                                    <optgroup label="Semester Baru">  
                                        <option value="ganjil">Semester Ganjil</option>
                                        <option value="genap">Semester Genap</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Dari Tanggal</label>
                                <input type="date" name="dari_tanggal" class="form-control" id="exampleInputEmail1"  placeholder="Dari Tanggal" value="{{$data->dari_tanggal}}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Sampai Tanggal</label>
                                <input type="date" name="sampai_tanggal" class="form-control" id="exampleInputEmail1"  placeholder="Sampai Tanggal" value="{{$data->sampai_tanggal}}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tgl Pembagian Raport</label>
                                <input type="date" name="tgl_pembagian_raport" class="form-control" id="exampleInputEmail1"  placeholder="Tanggal Pembagian Raport" value="{{$data->tgl_pembagian_raport}}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tahun Ajaran</label>
                                <input type="text" name="tahun_ajaran" class="form-control" id="exampleInputEmail1"  placeholder="Tahun Ajaran" value="{{$data->tahun_ajaran}}" required>
                            </div>
                        </div>
                    </div>
                    <br>
                    <a href="{{route('semester-active.index')}}" class="btn btn-outline-warning btn-sm"><i class="far fa-arrow-alt-circle-left pr-2"></i>Kembali</a>
                    <button type="submit" class="btn btn-outline-primary btn-sm"><i class="fas fa-save pr-2"></i>Simpan</button>
                </form>
        </div>
    </div>
        </div>
    </div>
@endsection
