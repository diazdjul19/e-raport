<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>


    
        <h4 class="text-center">Rekapulasi Absent Kelas {{$kelas->nama_kelas}}</h4>
        <h5 class="text-center">Semester : @if ($semester == "ganjil")
                                                Semester Satu (Ganjil)
                                            @elseif ($semester == "genap")
                                                Semester Dua (Genap)
                                            @endif
                                -
                                Th Ajaran : {{$th_pelajaran}}
        </h5>

        <hr>
        <hr>
        <table id="" class="table text-center pt-2 pb-2" border="1"  >
            <thead style="background-color: #d6d6d6;">
                <tr>
                    <th style="vertical-align: middle;" rowspan="2">No</th>
                    <th style="vertical-align: middle;" rowspan="2">Nama Siswa</th>
                    <th style="vertical-align: middle;" rowspan="2">NISN</th>
                    <th style="vertical-align: middle;" rowspan="2">Kelas</th>
                    <th style="vertical-align: middle;" colspan="3">
                        Data Absensi 
                        <br>
                        Dari <span class="badge badge-success" style="font-size:12px;">{{date('d F Y', strtotime($dari_bln))}}</span>
                        Sampai <span class="badge badge-danger" style="font-size:12px;">{{date('d F Y', strtotime($sampai_bln))}}</span>
                    </th>
                    <th style="background-color: #0866C6; color:white; vertical-align: middle;" rowspan="2">Jumlah</th>
                </tr>
                <tr>
                    <th style="background-color: lightgreen;">Sakit</th>
                    <th style="background-color: yellow;">Izin</th>
                    <th style="background-color: red;">Alfa</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td class="text-left">{{$item->nama_siswa}}</td>
                        <td>{{$item->nis_siswa}}</td>
                        <td>{{$kelas->nama_kelas}}</td>
                        <td style="background-color: #ccf9cc; color:black;">{{$item->sakit}}</td>
                        <td style="background-color: #ffff8c; color:black;">{{$item->izin}}</td>
                        <td style="background-color: #ff9e9e; color:black;">{{$item->alpa}}</td>
                        <td style="background-color: #BFF5F6; color:black; font-weight:bold;">{{$item->sakit + $item->izin + $item->alpa}}</td>
                    </tr>
                @endforeach
            </tbody>
        
        </table>
        





<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>    
</body>
</html>