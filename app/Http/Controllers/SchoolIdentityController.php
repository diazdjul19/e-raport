<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MsSchoolIdentity;

use JD\Cloudder\Facades\Cloudder;


class SchoolIdentityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // For Create
        $data_id = MsSchoolIdentity::first();

        // + Tambah Kode Acal
        $length = 20;
        $char = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $char_length = strlen($char);
        $random_string = 'Code-';
        for($i=0; $i < $length; $i++){
            $random_string .= $char[rand(0,$char_length-1)];
        }


        if ($data_id == null) {
            return view('dashboard_admin.school_identity.school_identity', compact('random_string', 'data_id'));
        }elseif ($data_id != null) {
            $data_edit = MsSchoolIdentity::where('NPSN', $data_id->NPSN)->first();
            return view('dashboard_admin.school_identity.school_identity', compact('random_string', 'data_id', 'data_edit'));

        }
        
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
        if ($request->random_string == null) {
            return redirect(route('school-identity.index'));
        }

        $data = new MsSchoolIdentity();
        $data->nama_sekolah = $request->nama_sekolah;
        $data->NPSN = $request->NPSN;
        $data->no_telpon_sekolah = $request->no_telpon_sekolah;
        $data->email_sekolah = $request->email_sekolah;
        $data->website_resmi_sekolah = $request->website_resmi_sekolah;
        $data->alamat_sekolah = $request->alamat_sekolah;
        $data->kelurahan = $request->kelurahan;
        $data->kecamatan = $request->kecamatan;
        $data->kota_kabupaten = $request->kota_kabupaten;
        $data->provinsi = $request->provinsi;

        // MENGUPLOAD IMAGE KE STORAGE LARAVEL
        // if(isset($request->logo_sekolah)){
        //     $imageFile = $request->nama_sekolah.'/'.\Str::random(60).'.'.$request->logo_sekolah->getClientOriginalExtension();
        //     $image_path = $request->file('logo_sekolah')->move(storage_path('app/public/logo_sekolah/'.$request->nama_sekolah), $imageFile);

        //     $data->logo_sekolah = $imageFile;
        // }

        // MENGUPLOAD IMAGE KE STORAGE CLOUDINARY
        if ($image = $request->file('logo_sekolah')) {
            $image_path = $image->getRealPath();

            Cloudder::upload($image_path, null, array("folder" => "e-raport-storage/logo-sekolah", "overwrite" => TRUE, "resource_type" => "image"));
            //直前にアップロードされた画像のpublicIdを取得する。
            $publicId = Cloudder::getPublicId();
            $logoUrl = Cloudder::secureShow($publicId);

            $data->logo_sekolah_public_id = $publicId;
            $data->logo_sekolah = $logoUrl;
        }

        
        $data->iframe_sekolah = $request->iframe_sekolah;

        
        $data->save();

        \Session::flash('success_create', "Data Identitas Sekolah $request->nama_sekolah Berhasil Di Publish");
        return redirect(route('school-identity.index'));
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
        $check = MsSchoolIdentity::where('id' , $id)->first();

        if ($check) {
            $data = MsSchoolIdentity::find($id);
            $data->nama_sekolah = $request->get('nama_sekolah');
            $data->NPSN = $request->get('NPSN');
            $data->no_telpon_sekolah = $request->get('no_telpon_sekolah');
            $data->email_sekolah = $request->get('email_sekolah');
            $data->website_resmi_sekolah = $request->get('website_resmi_sekolah');
            $data->alamat_sekolah = $request->get('alamat_sekolah');
            $data->kelurahan = $request->get('kelurahan');
            $data->kecamatan = $request->get('kecamatan');
            $data->kota_kabupaten = $request->get('kota_kabupaten');
            $data->provinsi = $request->get('provinsi');

            //MENGUPLOAD IMAGE KE STORAGE laravel
            // if(isset($request->logo_sekolah)){
            //     $imageFile = $request->nama_sekolah.'/'.\Str::random(60).'.'.$request->logo_sekolah->getClientOriginalExtension();
            //     $image_path = $request->file('logo_sekolah')->move(storage_path('app/public/logo_sekolah/'.$request->nama_sekolah), $imageFile);

            //     $data->logo_sekolah = $imageFile;
            // }

            // MENGHAPUS IMAGE LAMA, JIKA DI TEMUKAN DATA YANG BARU DI EDIT
            if(isset($request->logo_sekolah)){
                if ($data->logo_sekolah_public_id) {
                    Cloudder::destroyImage($data->logo_sekolah_public_id);
                }
            }

            // MENGUPLOAD IMAGE KE STORAGE CLOUDINARY
            if ($image = $request->file('logo_sekolah')) {
                $image_path = $image->getRealPath();
                Cloudder::upload($image_path, null, array("folder" => "e-raport-storage/logo-sekolah", "overwrite" => TRUE, "resource_type" => "image"));

                //直前にアップロードされた画像のpublicIdを取得する。
                $publicId = Cloudder::getPublicId();
                $logoUrl = Cloudder::secureShow($publicId);

                $data->logo_sekolah_public_id = $publicId;
                $data->logo_sekolah = $logoUrl;
            }

            $data->iframe_sekolah = $request->get('iframe_sekolah');
            

            $data->save();

            \Session::flash('success', "Data Identitas Sekolah $data->nama_sekolah Berhasil Di Publish");
            return redirect(route('school-identity.index'));

            
        }else {
            return redirect(route('school-identity.index'));
        }
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
}
