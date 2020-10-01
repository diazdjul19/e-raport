<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\MsStudents;

class StudentsImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {

        foreach ($collection as $key => $row ) {

            if ($key >= 10) {
                $tanggal_lahir = ($row[5] - 25569 ) * 86400;
                MsStudents::create([
                    'nama_peserta_didik' => $row[0],
                    'nomor_induk' => $row[1],
                    'nis' => $row[2],
                    'nisn' => $row[3],
                    'tempat_lahir' => $row[4],
                    'tanggal_lahir' => gmdate('Y-m-d', $tanggal_lahir),
                    'jk_siswa' => $row[6],
                    'agama' => $row[7],
                    'anak_ke' => $row[8],
                    'dari_berapa_bersaudara' => $row[8],
                    'set_dlm_kel' => $row[10],
                    'alamat_peserta_didik' => $row[11],
                    'sekolah_asal' => $row[12],
                    'nomor_telpon_siswa' => $row[13],
                    'email_siswa' => $row[14],
                    'nama_ayah' => $row[15],
                    'nama_ibu' => $row[16],
                    'pekerjaan_ayah' => $row[17],
                    'pekerjaan_ibu' => $row[18],
                    'alamat_orangtua' => $row[19],
                    'nomor_telpon_rumah' => $row[20],
                    'nama_wali' => $row[21],
                    'jk_wali' => $row[22],
                    'pekerjaan_wali' => $row[23],

                    'status' => 'not_active',
                    'username' => $row[2],
                    'password' => 'siswa123',


                ]);
            }else {
                # code...
            }

            
            
        }
    }
}
