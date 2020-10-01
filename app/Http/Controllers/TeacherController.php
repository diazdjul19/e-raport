<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MsTeacher;
use App\Models\MsMapel;
use App\Models\MsKelas;

use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;




class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = MsTeacher::with('relasi_walas_kelas')->get();
        // $data = MsTeacher::join('ms_kelas', 'ms_teachers.walas_kelas', '=', 'ms_kelas.id')->get();
        
        // return $data;
        return view('dashboard_admin.teacher.teacher', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bidang_study = MsMapel::orderBy('nama_mapel', 'asc')->get();


        $data_not_null = MsTeacher::whereNotNull('walas_kelas')->get('walas_kelas');
        $walas_kelas = MsKelas::whereNotIn('id', $data_not_null)->orderBy('nama_kelas', 'asc')->get();

        
        return view('dashboard_admin.teacher.teacher_create', compact('bidang_study', 'walas_kelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = request()->validate([
            'nama_guru' => 'required',
            'nip' => 'required|digits_between:0,18|numeric',
            'nuptk' => 'required|digits_between:0,16|numeric',
            'jenis_guru' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',

        ]);

        $check_nip_guru = MsTeacher::where('nip', $request->nip)->first();
        if ($check_nip_guru) {
            \Session::flash('error_nip', "Maaf Data Guru Dengan NIP $request->nip Sudah Pernah Di Buat.");
            return redirect(route('teacher.index'));
        }

        $check_walas_kelas = MsTeacher::where('walas_kelas', $request->walas_kelas)->first(); ##Mengambil nama dari table MsKelas Berdasarkan id request walas_kelas
        
        if ($request->walas_kelas != null) {
            if ($check_walas_kelas == true) {
                \Session::flash('error_walas', "Mohon Maaf Wali Kelas Untuk Kelas $request->nama_kelas Sudah Ada.");
                return redirect(route('teacher.index'));
            
            }
        }

        $data = new MsTeacher();
        $data->nama_guru = $request->nama_guru;
        $data->nuptk = $request->nuptk;
        $data->nip = $request->nip;
        $data->bidang_study = $request->bidang_study;
        $data->jabatan_fungsional = $request->jabatan_fungsional;
        $data->tempat_lahir = $request->tempat_lahir;
        $data->tanggal_lahir = $request->tanggal_lahir;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->agama = $request->agama;
        $data->jenis_guru = $request->jenis_guru;
        $data->no_telpon_guru = $request->no_telpon_guru;
        $data->email_guru = $request->email_guru;
        $data->walas_kelas = $request->walas_kelas;

        if(isset($request->foto_guru)){
            $imageFile = $request->nama_guru.'/'.\Str::random(60).'.'.$request->foto_guru->getClientOriginalExtension();
            $image_path = $request->file('foto_guru')->move(storage_path('app/public/foto_guru/'.$request->nama_guru), $imageFile);

            $data->foto_guru = $imageFile;
        }

        // Input Defaut
        $data->status_user = "not_active";
        $data->username = $request->nip; ## Username defaut di ambil dari Request NIP ##
        $data->password = "guru123"; ## Password Default merupakan guru123 ##


        $data->save();
        \Session::flash('success_create', "$data->nama_guru Username Defaut : $data->nip, Password Defaut : $data->password");
        return redirect(route('teacher.index'));
        
    }

        

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = MsTeacher::with('relasi_walas_kelas', 'relasi_bidang_study')->find($id);
        return view('dashboard_admin.teacher.teacher_detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = MsTeacher::with('relasi_bidang_study', 'relasi_walas_kelas')->find($id);

        $bidang_study = MsMapel::orderBy('nama_mapel', 'asc')->get();

        $data_not_null = MsTeacher::whereNotNull('walas_kelas')->get('walas_kelas');
        $walas_kelas = MsKelas::whereNotIn('id', $data_not_null)->orderBy('nama_kelas', 'asc')->get();


        return view('dashboard_admin.teacher.teacher_edit', compact('data', 'bidang_study', 'walas_kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = request()->validate([
            'nama_guru' => 'required',
            'nip' => 'required|digits_between:0,18|numeric',
            'nuptk' => 'required|digits_between:0,16|numeric',
            'jenis_guru' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',

        ]);


        $data = MsTeacher::find($id); ##Ini untuk mengembil data dari id yang di inputkan dari file "teacher.blade.php"
        $data->nama_guru = $request->get('nama_guru');
        $data->nuptk = $request->get('nuptk');
        $data->nip = $request->get('nip');
        $data->bidang_study = $request->get('bidang_study');
        $data->jabatan_fungsional = $request->get('jabatan_fungsional');
        $data->tempat_lahir = $request->get('tempat_lahir');
        $data->tanggal_lahir = $request->get('tanggal_lahir');
        $data->jenis_kelamin = $request->get('jenis_kelamin');
        $data->agama = $request->get('agama');
        $data->jenis_guru = $request->get('jenis_guru');
        $data->no_telpon_guru = $request->get('no_telpon_guru');
        $data->email_guru = $request->get('email_guru');
        $data->walas_kelas = $request->get('walas_kelas');
        $data->status_user = $request->get('status_user');

        
        // Ini adalah kondisi Pengimputan field data Foto Guru
        if(isset($request->foto_guru)){
            $imageFile = $request->nama_guru.'/'.\Str::random(60).'.'.$request->foto_guru->getClientOriginalExtension();
            $image_path = $request->file('foto_guru')->move(storage_path('app/public/foto_guru/'.$request->nama_guru), $imageFile);

            $data->foto_guru = $imageFile;
        }

        // Ini adalah kondisi Pengimputan field data Username
        if (isset($request->username)) {
            $data->username = $request->get('username');
        }

        // Ini adalah kondisi jika Password dan Confirm Password yang di inptkan tidak sama
        if ($request->password != $request->password_confirmation) {
            \Session::flash('password_tidak_cocok', 'Password & Confirm Password Tidak Sama');

            return redirect(route('teacher.edit', [$data->id ]));
            
        }

        // Ini adalah kondisi pengimputan sekaligus meng-hash password
        if (isset($request->password)) {
            $data->password = Hash::make($request->password);
        }

        $data->save();
        alert()->success('Success','Data Berhasil Di Update');
        return redirect(route('teacher.index'));






    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



    public function select_delete_teacher(Request $request){

        $select_delete = $request->get('select_delete');
        if ($select_delete == true) {
            
            $data_confirm = MsTeacher::whereIn('id', $select_delete)->get('id');

            if ($data_confirm == true) {
                $delete_now = MsTeacher::whereIn('id', $data_confirm)->delete(); 
            }else {
                return "Gagal Menghapus Data :(";
            }

            toast('Data Berhasil Di Hapus','info');
            return redirect(route('teacher.index'));

        }else {
            return redirect(route('teacher.index'));
        }
    }

    public function teacher_active($id)
    {
        $data = MsTeacher::find($id);
        $data->update(['status_user' => 'active']);
        return redirect(route('teacher.index'));
    }

    public function teacher_not_active($id)
    {
        $data = MsTeacher::find($id);
        $data->update(['status_user' => 'not_active']);
        return redirect(route('teacher.index'));
    }
}
