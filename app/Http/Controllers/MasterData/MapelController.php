<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MsMapel;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = MsMapel::all();
        return view('dashboard_admin.mapel.mapel', compact('data'));
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
            'kategori_mapel' => 'required', 'string', 'max:255',
        ]);

        $data = new MsMapel();
        $data->nama_mapel = $request->nama_mapel;
        $data->kode_mapel = $request->kode_mapel;
        $data->kategori_mapel = $request->kategori_mapel;
        $data->KKM = $request->KKM;

        $data->save();
        alert()->success('Success','Data Berhasil Di Tambahkan');
        return redirect(route('mapel.index'));
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
        $data = MsMapel::find($id);
        $data->nama_mapel = $request->get('nama_mapel');
        $data->kode_mapel = $request->get('kode_mapel');

        if (isset($request->kategori_mapel)) {
            $data->kategori_mapel = $request->get('kategori_mapel');
        }
        
        $data->KKM = $request->get('KKM');
        $data->save();

        alert()->success('Success','Data Berhasil Di Update');
        return redirect(route('mapel.index'));

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = MsMapel::find($id)->delete();
        return redirect(route('mapel.index'));
    }
}
