<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MsStudents;
use App\Models\MsKelas;
use App\Models\MsJurusan;

use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

// export excel
use App\Exports\DownloadFormatImportStudents;
use Maatwebsite\Excel\Facades\Excel;




class StudentsController extends Controller
{


    // START MANAGEMENT DATA BARU
    public function management_data_baru()
    {
        $data = MsStudents::whereNull('di_terima_di_kelas')->orderBy('nama_peserta_didik', 'asc')->get();
        return view('dashboard_admin.students.management_data_baru', compact('data'));
    }

    public function management_data_baru_create()
    {
        return view('dashboard_admin.students.management_data_baru_create');
    }

    public function management_data_baru_store(Request $request)
    {
        $data = request()->validate([
            'nama_peserta_didik' => 'required',
            'nomor_induk' => 'required|digits_between:0,12|numeric',
            'nis' => 'required|digits_between:0,12|numeric',
            'nisn' => 'required|digits_between:0,10|numeric',
            'jk_siswa' => 'required',
            'agama' => 'required',
        ]);

        $check_nomor_induk = MsStudents::where('nomor_induk', $request->nomor_induk)->first();
        if ($check_nomor_induk) {
            \Session::flash('error_data_double', "Maaf Data Dengan Nomer Induk $request->nomor_induk Sudah Pernah Di Buat");
            return redirect(route('management-data-baru-create'));
        }

        $check_nis = MsStudents::where('nis', $request->nis)->first();
        if ($check_nis) {
            \Session::flash('error_data_double', "Maaf Data Dengan Nomer NIS $request->nis Sudah Pernah Di Buat");
            return redirect(route('management-data-baru-create'));
        }

        $check_nisn = MsStudents::where('nisn', $request->nisn)->first();
        if ($check_nisn) {
            \Session::flash('error_data_double', "Maaf Data Dengan Nomer NISN $request->nisn Sudah Pernah Di Buat");
            return redirect(route('management-data-baru-create'));
        }

        $data = new MsStudents();
        $data->nama_peserta_didik = $request->nama_peserta_didik;
        $data->nomor_induk = $request->nomor_induk;
        $data->nis = $request->nis;
        $data->nisn = $request->nisn;
        $data->tempat_lahir = $request->tempat_lahir;
        $data->tanggal_lahir = $request->tanggal_lahir;
        $data->jk_siswa = $request->jk_siswa;
        $data->agama = $request->agama;
        $data->anak_ke = $request->anak_ke;
        $data->dari_berapa_bersaudara = $request->dari_berapa_bersaudara;
        $data->set_dlm_kel = $request->set_dlm_kel;
        $data->alamat_peserta_didik = $request->alamat_peserta_didik;
        $data->sekolah_asal = $request->sekolah_asal;
        $data->nomor_telpon_siswa = $request->nomor_telpon_siswa;
        $data->email_siswa = $request->email_siswa;
        $data->nama_ayah = $request->nama_ayah;
        $data->nama_ibu = $request->nama_ibu;
        $data->pekerjaan_ayah = $request->pekerjaan_ayah;
        $data->pekerjaan_ibu = $request->pekerjaan_ibu;
        $data->alamat_orangtua = $request->alamat_orangtua;
        $data->nomor_telpon_rumah = $request->nomor_telpon_rumah;
        $data->nama_wali = $request->nama_wali;
        $data->jk_wali = $request->jk_wali;
        $data->pekerjaan_wali = $request->pekerjaan_wali;

        if (isset($request->foto_siswa)) {
            $imageFile = $request->nama_peserta_didik . '/' . \Str::random(60) . '.' . $request->foto_siswa->getClientOriginalExtension();
            $image_path = $request->file('foto_siswa')->move(storage_path('app/public/foto_siswa/' . $request->nama_peserta_didik), $imageFile);

            $data->foto_siswa = $imageFile;
        }

        // Input Defaut
        $data->status = "not_active";
        $data->username = $request->nis; ## Username defaut di ambil dari Request NIS ##
        $data->password = "siswa123"; ## Password Default merupakan siswa ##

        // return $data;
        $data->save();
        \Session::flash('success_create', "$data->nama_peserta_didik Username Defaut : $data->nis, Password Defaut : $data->password");
        return redirect(route('management-data-baru'));
    }

    public function add_check_list_kelas_jurusan()
    {

        $data_siswa = MsStudents::whereNull('di_terima_di_kelas')->orderBy('nama_peserta_didik', 'asc')->get();
        $data_kelas = MsKelas::orderBy('nama_kelas', 'asc')->get();
        $data_jurusan = MsJurusan::orderBy('nama_jurusan', 'asc')->get();

        return view('dashboard_admin.students.check_list_kelas_jurusan', compact('data_siswa', 'data_kelas', 'data_jurusan'));
    }

    public function edit_check_list_kelas_jurusan($id)
    {

        $data_siswa = MsStudents::where('sekarang_kelas', $id)->with('relasi_di_terima_di_kelas', 'relasi_sekarang_kelas')->orderBy('nama_peserta_didik', 'asc')->get();

        $data_kelas = MsKelas::orderBy('nama_kelas', 'asc')->get();
        $data_jurusan = MsJurusan::orderBy('nama_jurusan', 'asc')->get();

        $kelas = MsKelas::find($id);



        return view('dashboard_admin.students.edit_check_list_kelas_jurusan', compact('kelas', 'data_siswa', 'data_kelas', 'data_jurusan'));
    }

    public function get_pilih_jurusan(Request $request)
    {
        $data = MsKelas::find($request->id);
        return response()->json($data, 200);
    }

    public function check_list_kelas_jurusan_action(Request $request)
    {
        $data = request()->validate([
            'diterima_di_kelas' => 'required',
            'diterima_pada_tanggal' => 'required',
        ]);

        $diterima_di_kelas = $request->diterima_di_kelas;
        $diterima_pada_tanggal = $request->diterima_pada_tanggal;
        $sekarang_kelas = $request->sekarang_kelas;
        $siswa_multiple = $request->get('siswa_pilih');


        // For Back
        $redirect_route = $request->redirect_route;
        $id_kelas = $request->id_kelas;


        if ($siswa_multiple == true) {

            if ($sekarang_kelas == null) {
                $data = MsStudents::whereIn('id', $siswa_multiple)
                    ->update(['di_terima_di_kelas' => $diterima_di_kelas, 'di_terima_pada_tanggal' => $diterima_pada_tanggal, 'sekarang_kelas' => $diterima_di_kelas, 'status' => 'active']);

                alert()->success('Success', 'Success Alert');
                // Back Route
                if ($id_kelas == null) {
                    return redirect(route('management-data-baru'));
                } elseif ($id_kelas == true) {
                    return redirect(route($redirect_route, $id_kelas));
                }
            } else {
                $data = MsStudents::whereIn('id', $siswa_multiple)
                    ->update(['di_terima_di_kelas' => $diterima_di_kelas, 'di_terima_pada_tanggal' => $diterima_pada_tanggal, 'sekarang_kelas' => $sekarang_kelas, 'status' => 'active']);

                alert()->success('Success', 'Success Alert');
                // Back Route
                if ($id_kelas == null) {
                    return redirect(route('management-data-baru'));
                } elseif ($id_kelas == true) {
                    return redirect(route($redirect_route, $id_kelas));
                }
            }
        } else {
            // Back Route
            if ($id_kelas == null) {
                return redirect(route('management-data-baru'));
            } elseif ($id_kelas == true) {
                return redirect(route($redirect_route, $id_kelas));
            }
        }
    }


    public function download_format_import_students()
    {
        return Excel::download(new DownloadFormatImportStudents, 'Format-Import-Students.xlsx');
    }

    public function import_students(Request $request)
    {
        Excel::import(new \App\Imports\StudentsImport, $request->file('file_import'));

        alert()->success('Success', 'Success Import');
        return redirect(route('management-data-baru'));
    }
    // FINISH MANAGEMENT DATA BARU  


    // START MANAGEMENT STUDENTS KELAS 10, 11, 12
    public function management_students_kelas_10()
    {
        // UNTUK JOIN JIKA INGIN DI PAKAI
        // $data = MsStudents::join('ms_kelas', 'ms_students.sekarang_kelas', '=', 'ms_kelas.id')->where('tingkat_kelas', 'X (10)')->orderBy('nama_kelas', 'asc')->get();

        $tingkat = "X (10)";
        $kelas_10 = MsKelas::where('tingkat_kelas', $tingkat)->orderBy('jurusan_kelas', 'desc')->get();

        return view('dashboard_admin.students.management_students_kelas_10', compact('kelas_10'));
    }

    public function management_students_kelas_11()
    {
        $tingkat = "XI (11)";
        $kelas_11 = MsKelas::where('tingkat_kelas', $tingkat)->orderBy('jurusan_kelas', 'desc')->get();

        return view('dashboard_admin.students.management_students_kelas_11', compact('kelas_11'));
    }

    public function management_students_kelas_12()
    {
        $tingkat = "XII (12)";
        $kelas_12 = MsKelas::where('tingkat_kelas', $tingkat)->orderBy('jurusan_kelas', 'desc')->get();

        return view('dashboard_admin.students.management_students_kelas_12', compact('kelas_12'));
    }

    public function management_students_kelas_all($id)
    {
        // $data = MsStudents::join('ms_kelas', 'ms_students.sekarang_kelas', '=', 'ms_kelas.id')->where('tingkat_kelas', 'X (10)')->orderBy('nama_kelas', 'asc')->get();
        $data_kelas = MsKelas::find($id);
        $data_siswa = MsStudents::where('sekarang_kelas', $id)->with('relasi_di_terima_di_kelas', 'relasi_sekarang_kelas')->orderBy('nama_peserta_didik', 'asc')->get();

        return view('dashboard_admin.students.management_students_kelas_all', compact('data_kelas', 'data_siswa'));
    }
    // FINISH MANAGEMENT STUDENTS KELAS 10, 11, 12






    // START FUNCTION (Edit, Update, Detail, Delete, Active User, Non Active User) MENJADI SATU.
    public function management_edit_data_students_all($id)
    {

        $find = MsStudents::find($id);

        if ($find->sekarang_kelas == null) {
            $data = MsStudents::whereNull('di_terima_di_kelas')->find($id);
            $kelas = MsKelas::orderBy('nama_kelas', 'asc')->get();
            return view('dashboard_admin.students.management_students_edit', compact('data', 'kelas'));
        } elseif ($find->sekarang_kelas != null) {
            $data = MsStudents::whereNotNull('di_terima_di_kelas')->with('relasi_di_terima_di_kelas', 'relasi_sekarang_kelas')->find($id);
            $kelas = MsKelas::orderBy('nama_kelas', 'asc')->get();
            return view('dashboard_admin.students.management_students_edit', compact('data', 'kelas'));
        }
    }


    public function management_update_data_students_all(Request $request, $id)
    {

        $data = request()->validate([
            'nama_peserta_didik' => 'required',
            'nomor_induk' => 'required|digits_between:0,12|numeric',
            'nis' => 'required|digits_between:0,12|numeric',
            'nisn' => 'required|digits_between:0,10|numeric',
            'jk_siswa' => 'required',
            'agama' => 'required',
        ]);




        $data = MsStudents::find($id);
        $from_route_edit = $request->from_route_edit;
        $redirect_route = $request->redirect_route;
        $id_kelas = $request->id_kelas;

        // Validasi Nomor Induk Sebelum Save()
        if ($data->nomor_induk == $request->nomor_induk) {
            // Langsung di lempar untuk di update
        } elseif (MsStudents::where('nomor_induk', $request->nomor_induk)->first()) {
            \Session::flash('error_data_double', "Maaf Data Dengan Nomer Induk $request->nomor_induk Sudah Ada");
            return redirect(route($from_route_edit, [$data->id]));
        }

        // Validasi NIS Sebelum Save()
        if ($data->nis == $request->nis) {
            // Langsung di lempar untuk di update
        } elseif (MsStudents::where('nis', $request->nis)->first()) {
            \Session::flash('error_data_double', "Maaf Data Dengan Nomer Induk $request->nis Sudah Ada");
            return redirect(route($from_route_edit, [$data->id]));
        }

        // Validasi NISN Sebelum Save()
        if ($data->nisn == $request->nisn) {
            // Langsung di lempar untuk di update
        } elseif (MsStudents::where('nisn', $request->nisn)->first()) {
            \Session::flash('error_data_double', "Maaf Data Dengan Nomer Induk $request->nisn Sudah Ada");
            return redirect(route($from_route_edit, [$data->id]));
        }

        $data->nama_peserta_didik = $request->get('nama_peserta_didik');
        $data->nomor_induk = $request->get('nomor_induk');
        $data->nis = $request->get('nis');
        $data->nisn = $request->get('nisn');
        $data->tempat_lahir = $request->get('tempat_lahir');
        $data->tanggal_lahir = $request->get('tanggal_lahir');
        $data->jk_siswa = $request->get('jk_siswa');
        $data->agama = $request->get('agama');
        $data->anak_ke = $request->get('anak_ke');
        $data->dari_berapa_bersaudara = $request->get('dari_berapa_bersaudara');
        $data->set_dlm_kel = $request->get('set_dlm_kel');
        $data->alamat_peserta_didik = $request->get('alamat_peserta_didik');
        $data->sekolah_asal = $request->get('sekolah_asal');
        $data->nomor_telpon_siswa = $request->get('nomor_telpon_siswa');
        $data->email_siswa = $request->get('email_siswa');
        $data->nama_ayah = $request->get('nama_ayah');
        $data->nama_ibu = $request->get('nama_ibu');
        $data->pekerjaan_ayah = $request->get('pekerjaan_ayah');
        $data->pekerjaan_ibu = $request->get('pekerjaan_ibu');
        $data->alamat_orangtua = $request->get('alamat_orangtua');
        $data->nomor_telpon_rumah = $request->get('nomor_telpon_rumah');
        $data->nama_wali = $request->get('nama_wali');
        $data->jk_wali = $request->get('jk_wali');
        $data->pekerjaan_wali = $request->get('pekerjaan_wali');

        if (isset($request->foto_siswa)) {
            $imageFile = $request->nama_peserta_didik . '/' . \Str::random(60) . '.' . $request->foto_siswa->getClientOriginalExtension();
            $image_path = $request->file('foto_siswa')->move(storage_path('app/public/foto_siswa/' . $request->nama_peserta_didik), $imageFile);

            $data->foto_siswa = $imageFile;
        }

        // Checklist Data
        $data->di_terima_di_kelas = $request->get('di_terima_di_kelas');
        $data->di_terima_pada_tanggal = $request->get('di_terima_pada_tanggal');
        $data->sekarang_kelas = $request->get('sekarang_kelas');


        // Ini adalah kondisi Pengimputan field data Username
        if (isset($request->username)) {
            $data->username = $request->get('username');
        }

        // Ini adalah kondisi jika Password dan Confirm Password yang di inptkan tidak sama
        if ($request->password != $request->password_confirmation) {
            \Session::flash('password_tidak_cocok', 'Password & Confirm Password Tidak Sama');

            return redirect(route($from_route_edit, [$data->id]));
        }

        // Ini adalah kondisi pengimputan sekaligus meng-hash password
        if (isset($request->password)) {
            $data->password = Hash::make($request->password);
        }


        $data->save();
        alert()->success('Success', 'Data Berhasil Di Update');


        if ($id_kelas == null) {
            return redirect(route($redirect_route));
        } elseif ($id_kelas == true) {
            return redirect(route($redirect_route, $id_kelas));
        }
    }

    public function management_detail_data_students_all($id)
    {
        $data = MsStudents::with('relasi_di_terima_di_kelas', 'relasi_sekarang_kelas')->find($id);
        return view('dashboard_admin.students.management_students_detail', compact('data'));
    }

    public function select_delete_data_students(Request $request)
    {
        $select_delete = $request->get('select_delete');
        if ($select_delete == true) {

            $data_confirm = MsStudents::whereIn('id', $select_delete)->get('id');

            if ($data_confirm == true) {
                $delete_now = MsStudents::whereIn('id', $data_confirm)->delete();
            } else {
                return "Gagal Menghapus Data :(";
            }

            toast('Data Berhasil Di Hapus', 'info');
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }

    public function management_students_set_active($id)
    {
        $data = MsStudents::find($id);
        $data->update(['status' => 'active']);
        return redirect()->back();
    }

    public function management_students_set_notactive($id)
    {
        $data = MsStudents::find($id);
        $data->update(['status' => 'not_active']);
        return redirect()->back();
    }
    // FINISH FUNCTION (Edit, Update, Detail, Delete, Active User, Non Active User) MENJADI SATU.












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
