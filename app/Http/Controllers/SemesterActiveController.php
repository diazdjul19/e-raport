<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MsSemesterActive;


class SemesterActiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = MsSemesterActive::all();
        $dt = date('Y-m-d H:i:s');
        return view('dashboard_admin.semester_active.semester_active', compact('data', 'dt'));
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
        $data = request()->validate([
            'nama_kepsek' => 'required', 'string', 'max:255',
            'pts_pas' => 'required', 'string', 'max:255',
            'semester' => 'required', 'string', 'max:255',
            'tahun_ajaran_dari' => 'required', 'date',
            'tahun_ajaran_sampai' => 'required', 'date',
            'dari_tanggal' => 'required',
            'sampai_tanggal' => 'required',
            'tgl_pembagian_raport' => 'required',
        ]);

        $data = new MsSemesterActive();
        $data->nama_kepsek = $request->nama_kepsek;
        $data->nip_kepsek = $request->nip_kepsek;
        $data->pts_pas = $request->pts_pas;
        $data->semester = $request->semester;
        $data->tahun_ajaran = $request->tahun_ajaran_dari."/".$request->tahun_ajaran_sampai;
        $data->dari_tanggal = $request->dari_tanggal;
        $data->sampai_tanggal = $request->sampai_tanggal;
        $data->tgl_pembagian_raport = $request->tgl_pembagian_raport;
        $data->status = "not_active";
        $data->save();
        alert()->success('Success','Data Berhasil Di Tambahkan');
        return redirect(route('semester-active.index'));
        

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
        $data = MsSemesterActive::find($id);
        
        $thn_ajaran_dari = substr( $data->tahun_ajaran,0,4);
        $thn_ajaran_sampai = substr( $data->tahun_ajaran,5,4);

        return view('dashboard_admin.semester_active.semester_active_edit', compact('data', 'thn_ajaran_dari', 'thn_ajaran_sampai'));
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
            'nama_kepsek' => 'required', 'string', 'max:255',
            'pts_pas' => 'required', 'string', 'max:255',
            'semester' => 'required', 'string', 'max:255',
            'tahun_ajaran_dari' => 'required', 'date',
            'tahun_ajaran_sampai' => 'required', 'date',
            'dari_tanggal' => 'required',
            'sampai_tanggal' => 'required',
            'tgl_pembagian_raport' => 'required',
        ]);

        $data = MsSemesterActive::find($id);
        $data->nama_kepsek = $request->get('nama_kepsek');
        $data->nip_kepsek = $request->get('nip_kepsek');
        $data->pts_pas = $request->get('pts_pas');
        $data->semester = $request->get('semester');
        $data->tahun_ajaran = $request->get('tahun_ajaran_dari')."/". $request->get('tahun_ajaran_sampai');
        $data->dari_tanggal = $request->get('dari_tanggal');
        $data->sampai_tanggal = $request->get('sampai_tanggal');
        $data->tgl_pembagian_raport = $request->get('tgl_pembagian_raport');
        
        $data->save();
        alert()->success('Success','Data Berhasil Di Edit');
        return redirect(route('semester-active.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = MsSemesterActive::find($id)->delete();
        return redirect(route('semester-active.index'));
    }


    public function semester_active_active($id)
    {
        $status_die = MsSemesterActive::where('status', 'active')->update(['status' => 'not_active']);

        $status_life = MsSemesterActive::find($id);
        $status_life->update(['status' => 'active']);
        return redirect(route('semester-active.index'));
    }

    public function semester_active_not_active($id)
    {
        $data = MsSemesterActive::find($id);
        $data->update(['status' => 'not_active']);
        return redirect(route('semester-active.index'));
    }    
}
