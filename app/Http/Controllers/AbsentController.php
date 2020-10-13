<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MsKelas;
use App\Models\MsJurusan;
use App\Models\MsAbsent;


class AbsentController extends Controller
{

    public function kehadiran_bulanan_siswa()
    {
        $tingkat_10 = "X (10)";
            $kelas_10 = MsKelas::where('tingkat_kelas', $tingkat_10)->orderBy('jurusan_kelas', 'desc')->get();

        $tingkat_11 = "XI (11)";
            $kelas_11 = MsKelas::where('tingkat_kelas', $tingkat_11)->orderBy('jurusan_kelas', 'desc')->get();

        $tingkat_12 = "XII (12)";
            $kelas_12 = MsKelas::where('tingkat_kelas', $tingkat_12)->orderBy('jurusan_kelas', 'desc')->get();

        return view('dashboard_admin.absent.kehadiran_bulanan_siswa', compact('kelas_10', 'kelas_11', 'kelas_12'));
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
