<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MsStudents;
use App\Models\MsKelas;
use App\Models\MsJurusan;
use App\Models\MsAbsent;
use App\Models\MsSemesterActive;

// export excel
use App\Exports\DownloadFormatExcelKehadiranSiswa;
use App\Exports\ExcelKehadiranBulananSiswa;
use App\Exports\ExcelRekapulasiAbsent;
use Maatwebsite\Excel\Facades\Excel;

use Carbon\Carbon;

use DB;

class AbsentController extends Controller
{

    // KEHADIRAN BULANAN SISWA  
    public function kehadiran_bulanan_kelas_siswa()
    {
        $tingkat_10 = "X (10)";
            $kelas_10 = MsKelas::where('tingkat_kelas', $tingkat_10)->orderBy('jurusan_kelas', 'desc')->get();

        $tingkat_11 = "XI (11)";
            $kelas_11 = MsKelas::where('tingkat_kelas', $tingkat_11)->orderBy('jurusan_kelas', 'desc')->get();

        $tingkat_12 = "XII (12)";
            $kelas_12 = MsKelas::where('tingkat_kelas', $tingkat_12)->orderBy('jurusan_kelas', 'desc')->get();


        $bln = date('F');
        $thn = date('Y');
        $data_absent = MsAbsent::get();
        
        return view('dashboard_admin.absent.kehadiran_bulanan_kelas_siswa', compact('kelas_10', 'kelas_11', 'kelas_12',   'bln','thn','data_absent'));
    }

    public function absent_ajax_search_kelas(Request $request)
    {

        if ($request->ajax()) {
            $search = $request->get('search');
            $search = str_replace("", "%", $search);

            $tingkat_10 = "X (10)";
            $getdata_10 = MsKelas::where('tingkat_kelas', $tingkat_10)->orderBy('jurusan_kelas', 'desc');
            $kelas_10 = $getdata_10->Where('nama_kelas','LIKE','%'.$search.'%')
                            ->orWhere('jurusan_kelas','LIKE','%'.$search.'%')
                            ->orWhere('tingkat_kelas','LIKE','%'.$search.'%')->get();
            
            $tingkat_11 = "XI (11)";
            $getdata_11 = MsKelas::where('tingkat_kelas', $tingkat_11)->orderBy('jurusan_kelas', 'desc');
            $kelas_11 = $getdata_11->Where('nama_kelas','LIKE','%'.$search.'%')
                            ->orWhere('jurusan_kelas','LIKE','%'.$search.'%')
                            ->orWhere('tingkat_kelas','LIKE','%'.$search.'%')->get();

            $tingkat_12 = "XII (12)";
            $getdata_12 = MsKelas::where('tingkat_kelas', $tingkat_12)->orderBy('jurusan_kelas', 'desc');
            $kelas_12 = $getdata_12->Where('nama_kelas','LIKE','%'.$search.'%')
                            ->orWhere('jurusan_kelas','LIKE','%'.$search.'%')
                            ->orWhere('tingkat_kelas','LIKE','%'.$search.'%')->get();


            $bln = date('F');
            $thn = date('Y');
            $data_absent = MsAbsent::get();
            
            // dd($kelas_10, $kelas_11, $kelas_12);

            return view('dashboard_admin.absent.ajax_search_kelas', compact('kelas_10', 'kelas_11', 'kelas_12',   'bln','thn','data_absent'));
        }

    }


    public function kehadiran_bulanan_siswa(Request $request, $id) {
        $data = MsKelas::find($id);
        $get_semester_active = MsSemesterActive::where('status', 'active')->get();
        
        // $get_th_pelajaran di ambil dari semua data semester active, lalu hanya di ambil tahun ajaran nya saja.
        $get_th_pelajaran = MsSemesterActive::get('tahun_ajaran');
        

        $bln = date('F');
        $thn = date('Y');
        $data_absent = MsAbsent::get();

        if ($data == null || $get_semester_active->isEmpty() || $get_th_pelajaran->isEmpty()) {
            alert()->warning('WarningAlert','Ada Data Yang Belum Lengkap / Aktif!!!');
            return redirect()->back();   
        }else{
            return view('dashboard_admin.absent.kehadiran_bulanan_siswa', compact('data','get_semester_active','get_th_pelajaran',   'bln', 'thn', 'data_absent'));
        }
        
    }


    public function download_format_excel_kehadiran_bulanan(Request $request)
    {
        $data_kelas = MsKelas::where('id', $request->id)->first();
        $tgl = date('M Y');
        return Excel::download(new DownloadFormatExcelKehadiranSiswa($request->id), "Format Kehadiran $data_kelas->nama_kelas ($tgl).xlsx");
        
    }

    public function import_kehadiran_bulanan(Request $request)
    {
        Excel::import(new \App\Imports\KehadiranBulananImport,$request->file('file_import_absent'));

        alert()->success('Success','Success Import');
        return redirect()->back();
    }


    public function buka_absent_siswa(Request $request)
    {
        // data url untuk pdf
        $data_url = $request->fullUrl();
        $data_url = \Str::substr($data_url, 39);
        

        $data_absent = MsAbsent::all();
        $this->validate($request,[
            'kelas_siswa' => 'required',
            'semester' => 'required',
            'th_pelajaran' => 'required',
            'bln_dwin' => 'required',
            'thn_dwin' => 'required',
        ]);

        $kelas_siswa = $request->kelas_siswa;
        $semester = $request->semester;
        $th_pelajaran = $request->th_pelajaran;
        $bln_dwin = $request->bln_dwin;
        $thn_dwin = $request->thn_dwin;

        $data = MsKelas::where('id', $request->kelas_siswa)->first();
        $get_semester_active = MsSemesterActive::where('status', 'active')->get();
        $get_th_pelajaran = MsSemesterActive::get('tahun_ajaran');


        
        $search = MsAbsent::when($kelas_siswa, function ($q) use ($kelas_siswa) {
                            return $q->where('kelas_siswa', 'like', '%'.$kelas_siswa.'%');
                        })
                        ->when($semester, function ($q) use ($semester) {
                            return $q->where('semester', 'like', '%'.$semester.'%');
                        })
                        ->when($th_pelajaran, function ($q) use ($th_pelajaran) {
                            return $q->where('th_pelajaran', 'like', '%'.$th_pelajaran.'%');
                        })
                        ->when($bln_dwin, function ($q) use ($bln_dwin) {
                            return $q->where('bln_dwin', 'like', '%'.$bln_dwin.'%');
                        })
                        ->when($thn_dwin, function ($q) use ($thn_dwin) {
                            return $q->where('thn_dwin', 'like', '%'.$thn_dwin.'%');
                        })
                        ->orderBy('nama_siswa', 'ASC')->get();


        $bln = date('F');
        $thn = date('Y');
        $data_absent = MsAbsent::get();
        
        
        
        return view('dashboard_admin.absent.kehadiran_bulanan_siswa', compact('data','get_semester_active','get_th_pelajaran','bln_dwin','thn_dwin',   'search','data_url',   'bln', 'thn', 'data_absent'));
    }


    public function pdf_kehadiran_bulanan_siswa(Request $request)
    {
        $this->validate($request,[
            'kelas_siswa' => 'required',
            'semester' => 'required',
            'th_pelajaran' => 'required',
            'bln_dwin' => 'required',
            'thn_dwin' => 'required',
        ]);
        
        $kelas_siswa = $request->kelas_siswa;
        $semester = $request->semester;
        $th_pelajaran = $request->th_pelajaran;
        $bln_dwin = $request->bln_dwin;
        $thn_dwin = $request->thn_dwin;
        
        $data = MsKelas::where('id', $request->kelas_siswa)->first();

        $search = MsAbsent::when($kelas_siswa, function ($q) use ($kelas_siswa) {
                            return $q->where('kelas_siswa', 'like', '%'.$kelas_siswa.'%');
                        })
                        ->when($semester, function ($q) use ($semester) {
                            return $q->where('semester', 'like', '%'.$semester.'%');
                        })
                        ->when($th_pelajaran, function ($q) use ($th_pelajaran) {
                            return $q->where('th_pelajaran', 'like', '%'.$th_pelajaran.'%');
                        })
                        ->when($bln_dwin, function ($q) use ($bln_dwin) {
                            return $q->where('bln_dwin', 'like', '%'.$bln_dwin.'%');
                        })
                        ->when($thn_dwin, function ($q) use ($thn_dwin) {
                            return $q->where('thn_dwin', 'like', '%'.$thn_dwin.'%');
                        })
                        ->orderBy('nama_siswa', 'ASC')->get();
        
        $pdf = \PDF::loadView('pdf.pdf_kehadiran_bulanan_siswa',  compact('data','bln_dwin','thn_dwin','search'))->setPaper('A4')->setOrientation('portrait');
        return $pdf->download("Laporan Kehadiran $kelas_siswa ($bln_dwin $thn_dwin).pdf");

    }

    public function excel_kehadiran_bulanan_siswa(Request $request)
    {
        $data_kelas = MsKelas::where('id', $request->kelas_siswa)->first();
        $tgl = date('M Y');
        return Excel::download(new ExcelKehadiranBulananSiswa($request->kelas_siswa, $request->semester, $request->th_pelajaran, $request->bln_dwin, $request->thn_dwin), "Excel Kehadiran Bulanan $data_kelas->nama_kelas ($tgl).xlsx");
    }





    // REKAPITULASI ABSENT
    public function rekapitulasi_absent()
    {
        $get_kelas_siswa = MsKelas::orderBy('nama_kelas', 'asc')->get();
        $get_semester_active = MsSemesterActive::where('status', 'active')->get();
        $get_th_pelajaran = MsSemesterActive::get('tahun_ajaran');

        if ($get_kelas_siswa->isEmpty() || $get_semester_active->isEmpty() || $get_th_pelajaran->isEmpty()) {
            alert()->warning('WarningAlert','Ada Data Yang Belum Lengkap / Aktif!!!');
            return redirect()->back();   
        }else{
            return view('dashboard_admin.absent.rekapulasi_absent', compact('get_kelas_siswa','get_semester_active', 'get_th_pelajaran'));
        }

        // return view('dashboard_admin.absent.rekapulasi_absent', compact('get_kelas_siswa','get_semester_active', 'get_th_pelajaran'));
    }

    public function buka_rekapulasi_absent(Request $request)
    {
        // data url untuk pdf
        $data_url = $request->fullUrl();
        $data_url = \Str::substr($data_url, 44);


        // data pendukung
        $kelas = MsKelas::where('id', $request->kelas_siswa)->first();
        $get_kelas_siswa = MsKelas::orderBy('nama_kelas', 'asc')->get();
        $get_semester_active = MsSemesterActive::where('status', 'active')->get();
        $get_th_pelajaran = MsSemesterActive::get('tahun_ajaran');


        $this->validate($request,[
            'kelas_siswa' => 'required',
            'semester' => 'required',
            'th_pelajaran' => 'required',
            'dari_bln' => 'required',
            'sampai_bln' => 'required',
        ]);

        $dari_bln = $request->dari_bln."-01";
        $sampai_bln = $request->sampai_bln."-31";

        // $data = MsAbsent::whereBetween('created_at',[$dari_bln, $sampai_bln])
        // ->where('kelas_siswa',$request->kelas_siswa)
        // ->where('th_pelajaran',$request->th_pelajaran)
        // ->where('semester',$request->semester)
        // ->select(DB::raw("id, nama_siswa, nis_siswa, kelas_siswa,  SUM(jml_sakit_bln) as sakit, SUM(jml_izin_bln) as izin, SUM(jml_alpa_bln) as alpa"))
        // ->groupBy('nis_siswa')
        // ->get(); 

        $data = MsAbsent::whereBetween('created_at',[$dari_bln, $sampai_bln])
        ->where('kelas_siswa',$request->kelas_siswa)
        ->where('th_pelajaran',$request->th_pelajaran)
        ->where('semester',$request->semester)
        ->select(DB::raw("id, nama_siswa, nis_siswa, kelas_siswa,  SUM(jml_sakit_bln) as sakit, SUM(jml_izin_bln) as izin, SUM(jml_alpa_bln) as alpa"))
        ->group('nis_siswa')
        ->get(); 

        return view('dashboard_admin.absent.rekapulasi_absent', compact('data_url', 'kelas', 'get_kelas_siswa','get_semester_active', 'get_th_pelajaran' ,    'data', 'dari_bln', 'sampai_bln'));
        
        
    }

    public function pdf_rekapulasi_absent(Request $request)
    {
        $this->validate($request,[
            'kelas_siswa' => 'required',
            'semester' => 'required',
            'th_pelajaran' => 'required',
            'dari_bln' => 'required',
            'sampai_bln' => 'required',
        ]);

        $dari_bln = $request->dari_bln."-01";
        $sampai_bln = $request->sampai_bln."-31";
        $semester = $request->semester;
        $th_pelajaran = $request->th_pelajaran;
        $kelas = MsKelas::where('id', $request->kelas_siswa)->first();

        $data = MsAbsent::whereBetween('created_at',[$dari_bln, $sampai_bln])
        ->where('kelas_siswa',$request->kelas_siswa)
        ->where('th_pelajaran',$request->th_pelajaran)
        ->where('semester',$request->semester)
        ->select(DB::raw('id, nama_siswa, nis_siswa, kelas_siswa,  SUM(jml_sakit_bln) as sakit, SUM(jml_izin_bln) as izin, SUM(jml_alpa_bln) as alpa'))
        ->groupBy('nis_siswa')
        ->get(); 

        
        $pdf = \PDF::loadView('pdf.pdf_rekapulasi_absent',  compact('dari_bln', 'sampai_bln', 'semester', 'th_pelajaran', 'kelas', 'data'))->setPaper('A4')->setOrientation('portrait');
        return $pdf->download("Rekapulasi Absent $request->kelas_siswa.pdf");

    }

    public function excel_rekapulasi_absent(Request $request)
    {
        $data_kelas = MsKelas::where('id', $request->kelas_siswa)->first();
        $tgl = date('M Y');
        return Excel::download(new ExcelRekapulasiAbsent($request->kelas_siswa, $request->semester, $request->th_pelajaran, $request->dari_bln, $request->sampai_bln), "Excel Rekapulasi Absent $data_kelas->nama_kelas.xlsx");
    }





    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function index()
    // {
    //     //
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     //
    // }
}