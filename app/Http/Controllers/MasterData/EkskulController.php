<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MsEkskul;

class EkskulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = MsEkskul::all();
        return view('dashboard_admin.ekskul.ekskul', compact('data'));
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
        $data = new MsEkskul();
        $data->nama_ekskul = $request->nama_ekskul;
        $data->pembina_ekskul = $request->pembina_ekskul;

        $data->save();
        alert()->success('Success',"Ekskul $request->nama_ekskul Berhasil Di Tambahkan");
        return redirect(route('ekskul.index'));
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
        $data = MsEkskul::find($id);
        $data->nama_ekskul = $request->get('nama_ekskul');
        $data->pembina_ekskul = $request->get('pembina_ekskul');
        $data->save();
        alert()->success('Success',"Data Telah Berhasil Di Update");
        return redirect(route('ekskul.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = MsEkskul::find($id)->delete();
        return redirect(route('ekskul.index'));
    }
}
