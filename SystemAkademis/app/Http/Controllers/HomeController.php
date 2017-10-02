<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
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
        $biodata = \app\mahasiswa::select('*')
            ->join('studi_program', 'studi_program.id', '=', 'mahasiswa.id_program_studi')
            ->where('user_id', Auth::id())
            ->first();
        $id = $biodata -> id;
        Log::info("Ai Di = ".$id);
        // Log::info("Biodat = ".$biodata);

        $pengumuman = DB::table('pengumuman')
                   ->select(DB::raw('user_id as id,judul as judul,isi as isi,date_create as date'))
                   ->where('isActive', '=', 1)
                   ->orderBy('date_create', 'DESC')
                   ->get();
        // Log::info("Pengu = ".$pengumuman);
        return view('home', ['pengumuman' => $pengumuman,'biodata'=>$biodata]);
    }
}
