<?php

namespace App\Exports;
use App\Models\MsKelas;
use App\Models\MsAbsent;
use DB;



// use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class ExcelRekapulasiAbsent implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $kelas_siswa;
    protected $semester;
    protected $th_pelajaran;
    protected $dari_bln_dwin;
    protected $sampai_bln_dwin;

    



    function __construct($kelas_siswa, $semester, $th_pelajaran, $dari_bln_dwin, $sampai_bln_dwin) {
            $this->kelas_siswa = $kelas_siswa;
            $this->semester = $semester;
            $this->th_pelajaran = $th_pelajaran;
            $this->dari_bln_dwin = $dari_bln_dwin;
            $this->sampai_bln_dwin = $sampai_bln_dwin;
            


    }


    public function view(): View
    {   

        $data = MsKelas::where('id', $this->kelas_siswa)->first();

        $kelas_siswa_oke = $this->kelas_siswa;
        $semester_oke = $this->semester;
        $th_pelajaran_oke = $this->th_pelajaran;
        $dari_bln_dwin_oke = $this->dari_bln_dwin."-01";
        $sampai_bln_dwin_oke = $this->sampai_bln_dwin."-31";

        $search = MsAbsent::whereBetween('created_at',[$dari_bln_dwin_oke, $sampai_bln_dwin_oke])
        ->where('kelas_siswa',$kelas_siswa_oke)
        ->where('th_pelajaran',$th_pelajaran_oke)
        ->where('semester',$semester_oke)
        ->select(\DB::raw('id, nama_siswa, nis_siswa, kelas_siswa,  SUM(jml_sakit_bln) as sakit, SUM(jml_izin_bln) as izin, SUM(jml_alpa_bln) as alpa'))
        ->groupBy('nis_siswa')
        ->get(); 

        return view('folder_excel.excel_rekapulasi_absent', compact('data', 'dari_bln_dwin_oke', 'sampai_bln_dwin_oke','semester_oke','th_pelajaran_oke', 'search'));
        



    }
}
