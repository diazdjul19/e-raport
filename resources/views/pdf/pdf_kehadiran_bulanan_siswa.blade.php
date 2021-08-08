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


    
        <h4 class="text-center">Laporan Kehadiran Bulan {{$bln_dwin}} Tahun {{$thn_dwin}}</h4>
        <hr>
        <hr>
        <table id="table_id" class="table text-center pt-2 pb-2" border="1"  >
            <thead style="background-color: #d6d6d6;">
                <tr>
                    <th style="vertical-align: middle;" rowspan="2">No</th>
                    <th style="vertical-align: middle;" rowspan="2">Nama Siswa</th>
                    <th style="vertical-align: middle;" rowspan="2">NISN</th>
                    <th style="vertical-align: middle;" rowspan="2">Kelas</th>
                    <th style="vertical-align: middle;" colspan="3">
                        Ketidakhadiran
                        Bulan <span class="badge badge-primary" style="font-size:12px;">{{$bln_dwin}} </span>
                        Thn <span class="badge badge-primary" style="font-size:12px;">{{$thn_dwin}} </span>
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
                @foreach ($search as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td class="text-left">{{$item->nama_siswa}}</td>
                        <td>{{$item->nis_siswa}}</td>
                        <td>{{$data->nama_kelas}}</td>
                        <td style="background-color: #ccf9cc; color:black;">{{$item->jml_sakit_bln}}</td>
                        <td style="background-color: #ffff8c; color:black;">{{$item->jml_izin_bln}}</td>
                        <td style="background-color: #ff9e9e; color:black;">{{$item->jml_alpa_bln}}</td>
                        <td style="background-color: #BFF5F6; color:black; font-weight:bold;">{{$item->jml_sakit_bln + $item->jml_izin_bln + $item->jml_alpa_bln}}</td>
                    </tr>
                @endforeach
            </tbody>
        
        </table>
        
       





<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>    
</body>
</html>