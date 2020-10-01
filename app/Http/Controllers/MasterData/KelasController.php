<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MsKelas;
use App\Models\MsJurusan;


class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $data = MsKelas::all();
        $data_jurusan = MsJurusan::all();
        return view('dashboard_admin.kelas.kelas', compact('data', 'data_jurusan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $check_data = MsKelas::where('nama_kelas', $request->nama_kelas)->first();

        if ($check_data) {
            \Session::flash('error_input', "Maaf, Data dengen nama kelas $request->nama_kelas sudah ada !!!");
            return redirect(route('kelas.index'));
        }

        $data = request()->validate([
            'tingkat_kelas' => 'required', 'string', 'max:255',
            'jurusan_kelas' => 'required', 'string', 'max:255',
        ]);

        $data = new MsKelas();
        $data->nama_kelas = $request->nama_kelas;
        $data->tingkat_kelas = $request->tingkat_kelas;
        $data->jurusan_kelas = $request->jurusan_kelas;
        $data->max_siswa = $request->max_siswa;

        $data->save();
        alert()->success('Success','Data Berhasil Di Tambahkan');
        return redirect(route('kelas.index'));
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        // $check_data = MsKelas::where('nama_kelas', $request->get('nama_kelas'))->first();

        // if ($check_data) {
        //     alert()->error('Gagal Update',"Data Nama Kelas Sudah Ada !!!");
        //     return redirect(route('kelas.index'));
        // }



        $data = MsKelas::find($id);

        if (isset($request->nama_kelas)) {
            $data->nama_kelas = $request->get('nama_kelas');
        }        
        if (isset($request->tingkat_kelas)) {
            $data->tingkat_kelas = $request->get('tingkat_kelas');
        }
        if (isset($request->jurusan_kelas)) {
            $data->jurusan_kelas = $request->get('jurusan_kelas');
        }
        $data->max_siswa = $request->get('max_siswa');
        $data->save();

        alert()->success('Success',"Data $data->nama_kelas Berhasil Di Update");
        return redirect(route('kelas.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = MsKelas::find($id)->delete();
        return redirect(route('kelas.index'));
    }
}
