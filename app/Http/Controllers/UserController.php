<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;
use Auth;
use DB;
use RealRashid\SweetAlert\Facades\Alert;

use JD\Cloudder\Facades\Cloudder;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::all();
        return view('dashboard_admin.user.user', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard_admin.user.user_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Membuat Validasi Dulu
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        // Untuk handle error messagenya.
        // biasakan pakai metode ini ya, try catch.
        try {

            // Fungsi DB::beginTransaction ini untuk melakukan pengecekan pada saat proses penginputan
            // Jika ada proses yg salah atau error di function bawah, datanya jadi gk akan masuk atau 
            // duplicate. biasakan juga pake ini ya. 👌
            DB::beginTransaction();

            // Membuat Data User
            $data = new User();
            $data->name = $request->name;
            $data->email = $request->email;
            $data->password = Hash::make($request->password);
            $data->tempat_lahir = $request->tempat_lahir;
            $data->tanggal_lahir = $request->tanggal_lahir;
            $data->jenis_kelamin = $request->jenis_kelamin;
            $data->no_hp = $request->no_hp;
            $data->level = $request->level;
            $data->foto_user = $request->foto_user;
            $data->status = "not_active";

            // MENGUPLOAD IMAGE KE STORAGE BAWAAN LARAVEL
            // if (isset($request->foto_user)) {
            //     $imageFile = $request->name . '/' . \Str::random(60) . '.' . $request->foto_user->getClientOriginalExtension();
            //     $image_path = $request->file('foto_user')->move(storage_path('app/public/user/' . $request->name), $imageFile);

            //     $data->foto_user = $imageFile;
            // }

            // MENGUPLOAD IMAGE KE STORAGE CLOUDINARY
            if ($image = $request->file('foto_user')) {
                $image_path = $image->getRealPath();

                Cloudder::upload($image_path, null, array("folder" => "e-raport-storage/tb_user_storage", "overwrite" => TRUE, "resource_type" => "image"));
                //直前にアップロードされた画像のpublicIdを取得する。
                $publicId = Cloudder::getPublicId();
                $logoUrl = Cloudder::secureShow($publicId);

                $data->foto_user_public_id = $publicId;
                $data->foto_user = $logoUrl;
            }

            $data->save();

            // DB::commit() ini akan menginput data jika dari proses diatas tidak ada yg salah atau error.
            DB::commit();
            $naus = $data->name;
            toast("User '$naus' Berhasil Di Tambahkan", 'success');
            return redirect(route('user.index'));
        } catch (\Exception $e) {
            // DB::rollback() yang akan mengembalikan data atau dihapus jika ada salah satu proses diatas ada yg
            // error ataupun salah. Biasakan pakai Ini juga 
            DB::rollback();
            toast($e->getMessage(), 'error');
            return redirect(route('user.index'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = User::find($id);
        return view('dashboard_admin.user.user_detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::find($id);
        return view('dashboard_admin.user.user_edit', compact('data'));
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
        try {
            // Fungsi DB::beginTransaction ini untuk melakukan pengecekan pada saat proses penginputan
            // Jika ada proses yg salah atau error di function bawah, datanya jadi gk akan masuk atau 
            // duplicate. biasakan juga pake ini ya. 👌
            DB::beginTransaction();

            $data = User::find($id);
            $data->name = $request->get('name');
            $data->email = $request->get('email');
            $data->tempat_lahir = $request->get('tempat_lahir');
            $data->tanggal_lahir = $request->get('tanggal_lahir');
            $data->jenis_kelamin = $request->get('jenis_kelamin');
            $data->no_hp = $request->get('no_hp');
            $data->level = $request->get('level');
            $data->status = $request->get('status');


            if ($request->password != $request->password_confirmation) {
                \Session::flash('gagal', 'Password Tidak Sama');

                return redirect(route('user.edit', [$data->id]));
            }

            if (isset($request->password)) {
                $data->password = Hash::make($request->password);
            }

            // MENGUPLAD IMAGE KE STORAGE BAWAAN LARAVEL
            // if (isset($request->foto_user)) {
            //     $imageFile = $request->name . '/' . \Str::random(60) . '.' . $request->foto_user->getClientOriginalExtension();
            //     $image_path = $request->file('foto_user')->move(storage_path('app/public/user/' . $request->name), $imageFile);

            //     $data->foto_user = $imageFile;
            // }

            // MENGHAPUS IMAGE LAMA, JIKA DI TEMUKAN DATA YANG BARU DI EDIT
            if(isset($request->foto_user)){
                if ($data->foto_user_public_id) {
                    Cloudder::destroyImage($data->foto_user_public_id);
                }
            }

            // MENGUPLOAD IMAGE KE STORAGE CLOUDINARY
            if ($image = $request->file('foto_user')) {
                $image_path = $image->getRealPath();
                Cloudder::upload($image_path, null, array("folder" => "e-raport-storage/tb_user_storage", "overwrite" => TRUE, "resource_type" => "image"));

                //直前にアップロードされた画像のpublicIdを取得する。
                $publicId = Cloudder::getPublicId();
                $logoUrl = Cloudder::secureShow($publicId);

                $data->foto_user_public_id = $publicId;
                $data->foto_user = $logoUrl;
            }

            $data->save();
            DB::commit();

            toast('Berhasil diperbarui', 'success');
            return redirect(route('user.index'));
        } catch (\Exception $e) {
            // DB::rollback() yang akan mengembalikan data atau dihapus jika ada salah satu proses diatas ada yg
            // error ataupun salah. Biasakan pakai Ini juga 
            DB::rollback();
            toast($e->getMessage(), 'error');
            return redirect(route('user.index'));
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


    /**
     * Biasakan untuk menggunakan fungsi default bawaan laravel untuk deletenya,
     * dan juga gunakan metode DELETE diroutenya. Kalau ingin bikin function baru
     * gunakan untuk function yg lain, karena untuk function Create Read Update Delete ini sudah ada
     * jadi gunakan defaultnya biar rapih. 😊
     *
     * @param Request $request
     * @return void
     */
    public function select_delete_user(Request $request)
    {
        $select_delete = $request->get('select_delete');

        if ($select_delete == true) {

            // START MENGHAPUS DATA DI CLOUDINARY
            $get_publicid_img = User::whereIn('id', $select_delete)->get();

            foreach ($get_publicid_img as $key) {
                if(isset($key->foto_user_public_id)){
                    Cloudder::destroyImage($key->foto_user_public_id);
                }
            }
            // END MENGHAPUS DATA DI CLOUDINARY

            $data_confirm = User::whereIn('id', $select_delete)->get('id');

            if ($data_confirm == true) {
                $delete_now = User::whereIn('id', $data_confirm)->delete();
            } else {
                return "Gagal Menghapus Data :(";
            }

            toast('Data Berhasil Di Hapus', 'info');
            return redirect(route('user.index'));
        } else {
            return redirect(route('user.index'));
        }
    }


    public function user_active($id)
    {
        $data = User::find($id);
        $data->update(['status' => 'active']);
        return redirect(route('user.index'));
    }

    public function user_not_active($id)
    {
        $data = User::find($id);
        $data->update(['status' => 'not_active']);
        return redirect(route('user.index'));
    }
}
