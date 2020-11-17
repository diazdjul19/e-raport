<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\MsAbsent;
use App\Models\MsKelas;


class KehadiranBulananImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {

        foreach ($collection as $key => $row ) {


            if ($key >= 9) {

                $r3 = $row[3];
                $r3r = MsKelas::where('nama_kelas', $r3)->first();
                $chartorow = $r3r->id;
                
                MsAbsent::create([
                    'nama_siswa' => $row[1],
                    'nis_siswa' => $row[2],
                    'kelas_siswa' => $chartorow,
                    'jml_sakit_bln' => $row[4],
                    'jml_izin_bln' => $row[5],
                    'jml_alpa_bln' => $row[6],
                    'th_pelajaran' => $row[7],
                    'semester' => $row[8],
                    'bln_dwin' => $row[9],
                    'thn_dwin' => $row[10],
                ]);


                
            }else {
                # code...
            }

            
            
        }
    }
}
