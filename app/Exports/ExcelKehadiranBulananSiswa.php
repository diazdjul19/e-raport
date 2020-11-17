<?php

namespace App\Exports;
use App\Models\MsKelas;
use App\Models\MsAbsent;



// use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class ExcelKehadiranBulananSiswa implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $kelas_siswa;
    protected $semester;
    protected $th_pelajaran;
    protected $bln_dwin;
    protected $thn_dwin;



    function __construct($kelas_siswa, $semester, $th_pelajaran, $bln_dwin, $thn_dwin) {
            $this->kelas_siswa = $kelas_siswa;
            $this->semester = $semester;
            $this->th_pelajaran = $th_pelajaran;
            $this->bln_dwin = $bln_dwin;
            $this->thn_dwin = $thn_dwin;


    }


    public function view(): View
    {   

        $data = MsKelas::where('id', $this->kelas_siswa)->first();

        $kelas_siswa_oke = $this->kelas_siswa;
        $semester_oke = $this->semester;
        $th_pelajaran_oke = $this->th_pelajaran;
        $bln_dwin_oke = $this->bln_dwin;
        $thn_dwin_oke = $this->thn_dwin ;


        $search = MsAbsent::when($kelas_siswa_oke, function ($q) use ($kelas_siswa_oke) {
                            return $q->where('kelas_siswa', 'like', '%'.$kelas_siswa_oke.'%');
                        })
                        ->when($semester_oke, function ($q) use ($semester_oke) {
                            return $q->where('semester', 'like', '%'.$semester_oke.'%');
                        })
                        ->when($th_pelajaran_oke, function ($q) use ($th_pelajaran_oke) {
                            return $q->where('th_pelajaran', 'like', '%'.$th_pelajaran_oke.'%');
                        })
                        ->when($bln_dwin_oke, function ($q) use ($bln_dwin_oke) {
                            return $q->where('bln_dwin', 'like', '%'.$bln_dwin_oke.'%');
                        })
                        ->when($thn_dwin_oke, function ($q) use ($thn_dwin_oke) {
                            return $q->where('thn_dwin', 'like', '%'.$thn_dwin_oke.'%');
                        })
                        ->orderBy('nama_siswa', 'ASC')->get();
        
        return view('folder_excel.excel_kehadiran_bulanan_siswa', compact('data', 'search'));


    }
}
