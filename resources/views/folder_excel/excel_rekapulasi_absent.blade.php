<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Excel</title>
</head>

<body>
    <div class="row">
        <div class="col-md-12 table-responsive">
            <table >
                <thead style="background-color: black;">
                    <tr>
                        <th><b>Tanggal Download : {{date('l, d F Y')}}</b></th>
                    </tr>
                    <tr></tr>
                    <tr>
                        <th><b>Rekapulasi Absent Kelas Dari : {{date('d F Y', strtotime($dari_bln_dwin_oke))}} Sampai : {{date('d F Y', strtotime($sampai_bln_dwin_oke))}}</b></th>
                    </tr>
                    <tr>
                        <th>
                            <b>
                                Semester : @if ($semester_oke == "ganjil")
                                                Semester Satu (Ganjil)
                                            @elseif ($semester_oke == "genap")
                                                Semester Dua (Genap)
                                            @endif
                                
                            </b>
                        </th>
                    </tr>
                    <tr>
                        <th><b>Th Ajaran : {{$th_pelajaran_oke}}</b></th>
                    </tr>

                    <tr></tr>

                    <tr>
                        <th style="width:5px; text-align:center; background-color: grey;"><b>NO</b></th>
                        <th style="width:30px; background-color: grey;"><b>NAMA SISWA</b></th>
                        <th style="width:20px; text-align:center; background-color: grey;"><b>NIS</b></th>
                        <th style="width:20px; text-align:center; background-color: grey;"><b>KELAS</b></th>
                        <th style="width:25px; text-align:center; background-color: green;"><b>JUMLAH SAKIT</b></th>
                        <th style="width:25px; text-align:center; background-color: yellow;"><b>JUMLAH IZIN</b></th>
                        <th style="width:25px; text-align:center; background-color: red;"><b>JUMLAH ALFA</b></th>
                        <th style="width:25px; text-align:center; background-color: blue;"><b>JUMLAH SEMUA</b></th>


                    </tr>
                </thead>

                <tbody>
                    @foreach ($search as $ds)
                        <tr>
                            <td style="width:5px; text-align:center">{{$loop->iteration}}</td>
                            <td style="width:30px;">{{$ds->nama_siswa}}</td>
                            <td style="width:20px; text-align:center">{{$ds->nis_siswa}}</td>
                            <td style="width:20px; text-align:center">{{$data->nama_kelas}}</td>
                            <td style="width:25px; text-align:center">{{$ds->sakit}}</td>
                            <td style="width:25px; text-align:center">{{$ds->izin}}</td>
                            <td style="width:25px; text-align:center">{{$ds->alpa}}</td>
                            <td style="width:25px; text-align:center">{{$ds->sakit + $ds->izin + $ds->alpa}}</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
