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
                        <th><b>*Warning : JANGAN PERNAH MENGUBAH TATA LETAK / MENG-HAPUS FORMAT YANG SUDAH ADA !!!</b></th>
                    </tr>
                    <tr>
                        <th><b>*Note : Field yang wajib di isi akan di beri tanda [*].</b></th>
                    </tr>
                    <tr>
                        <th><b>*Note : Data yang sudah ada tidak perlu di HAPUS, Kecuali jika ada kesalahan input</b></th>
                    </tr>
                    <tr>
                        <th><b>*Note : Format penulisan tanggal yaitu Tanggal/Bulan/Tahun, Contoh 01/01/2020</b></th>
                    </tr>
                    <tr>
                        <th><b>*Note : Jika data tidak di ketahui maka cukup kosongkan saja, Atau ganti menggunakan "-".</b></th>
                    </tr>

                    <tr></tr>

                    <tr>
                        <th style="width:5px; text-align:center"><b>NO</b></th>
                        <th style="width:30px;"><b>NAMA SISWA</b></th>
                        <th style="width:20px; text-align:center"><b>NIS</b></th>
                        <th style="width:20px; text-align:center"><b>KELAS</b></th>
                        <th style="width:25px; text-align:center; background-color: green;"><b>JUMLAH SAKIT</b></th>
                        <th style="width:25px; text-align:center; background-color: yellow;"><b>JUMLAH IZIN</b></th>
                        <th style="width:25px; text-align:center; background-color: red;"><b>JUMLAH ALFA</b></th>
                        <th style="width:20px; text-align:center"><b>TAHUN AJARAN</b></th>
                        <th style="width:20px; text-align:center"><b>SEMESTER</b></th>
                        <th style="width:20px; text-align:center"><b>BULAN KEHADIRAN</b></th>
                        <th style="width:20px; text-align:center"><b>TAHUN KEHADIRAN</b></th>

                    </tr>
                </thead>

                <tbody>
                    @foreach ($data_siswa as $ds)
                        <tr>
                            <td style="width:5px; text-align:center">{{$loop->iteration}}</td>
                            <td style="width:30px;">{{$ds->nama_peserta_didik}}</td>
                            <td style="width:20px; text-align:center">{{$ds->nis}}</td>
                            <td style="width:20px; text-align:center">{{$ds->relasi_sekarang_kelas ? $ds->relasi_sekarang_kelas->nama_kelas : '-'}}</td>
                            <td style="width:25px; text-align:center"></td>
                            <td style="width:25px; text-align:center"></td>
                            <td style="width:25px; text-align:center"></td>
                            <td style="width:23px; text-align:center">{{$data_semester->tahun_ajaran}}</td>
                            <td style="width:23px; text-align:center">{{$data_semester->semester}}</td>
                            <td style="width:23px; text-align:center">{{date('F')}}</td>
                            <td style="width:23px; text-align:center">{{date('Y')}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>





