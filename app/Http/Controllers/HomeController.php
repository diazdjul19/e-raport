<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MsSchoolIdentity;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data_iframe = MsSchoolIdentity::first('iframe_sekolah');
        return view('home', compact('data_iframe'));

        // if ($data_iframe == true) {
        //     return view('home', compact('data_iframe'));
        // }elseif ($data_iframe == false) {
        //     return view('home');   
        // }else{
        //     return view('home');   
        // }

    }
}
