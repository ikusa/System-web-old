<?php

namespace app\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use app\mahasiswa;

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
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    $idArray =\app\mahasiswa::select('id')
             ->where('user_id', Auth::id())
             ->take(1)
             ->get();
    $id = $idArray[0]->id;
		$biodata = \app\mahasiswa::select('*')
             ->where('id', $id)
             ->orderBy('id', 'desc')
             ->take(1)
             ->get();
		 $pengumuman = DB::table('pengumuman')
                     ->select(DB::raw('user_id as id,judul as judul,isi as isi,date_create as date'))
                     ->where('isActive', '=', 1)
                     ->orderBy('date_create','DESC')
                     ->get();
        return view('home', ['pengumuman' => $pengumuman,'biodata'=>$biodata]);
    }

}
