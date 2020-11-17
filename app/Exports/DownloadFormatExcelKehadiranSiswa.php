<?php

namespace App\Exports;

use App\Models\MsKelas;
use App\Models\MsSemesterActive;
use App\Models\MsStudents;


// use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;



class DownloadFormatExcelKehadiranSiswa implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $id;

    function __construct($id) {
            $this->id = $id;

    }


    public function view(): View
    {
        
        // $data_kelas = MsKelas::where('id', $this->id)->get();
        $data_siswa = MsStudents::where('sekarang_kelas', $this->id)->with('relasi_sekarang_kelas')->get();
        $data_semester = MsSemesterActive::where('status', 'active')->first();

        return view('folder_excel.download_format_excel_kehadiran_siswa', compact('data_siswa', 'data_semester'));
    }





}
