<?php

namespace app\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use app\Mahasiswa;
use Illuminate\Support\Facades\Log;

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

    $search_param = $request->input('search_param', 'null');
    $input= $request->input('x','null');
		$biodata = \app\user::select('name')
             ->where('id', Auth::id())
             ->orderBy('id', 'desc')
             ->take(1)
             ->get();
    if ($search_param!='null') {

      $table = \app\mahasiswa::select('*')
               ->join('program_studi', 'program_studi.id', '=', 'mahasiswa.id_program_studi')
               ->where($search_param,'like', '%'.$input.'%')
               ->get();
    }
    if ($search_param=='null') {
      $table = null;
    }
        return view('home', ['table' => $table,'biodata'=>$biodata]);
    }

}
